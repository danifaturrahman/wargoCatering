<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $menu_id = $request->input('menu_id');
            $jumlah = $request->input('jumlah');

            // Cek apakah menu dengan menu_id tertentu sudah ada dalam keranjang untuk user yang sedang login
            $existingCartItem = Cart::where('user_id', $user_id)
                ->where('menu_id', $menu_id)
                ->first();

            if ($existingCartItem) {
                // Jika menu sudah ada dalam keranjang, update jumlahnya
                $existingCartItem->jumlah += $jumlah;
                $existingCartItem->save();
            } else {
                // Jika menu belum ada dalam keranjang, buat item baru dalam keranjang
                $item = new Cart();
                $item->jumlah = $jumlah;
                $item->menu_id = $menu_id;
                $item->user_id = $user_id;
                $item->save();
            }

            // Ambil data cart untuk user yang sedang login
            $cartItems = Cart::where('user_id', $user_id)->get();

            // Loop melalui setiap item cart untuk mengupdate jumlahnya sesuai input user
            foreach ($cartItems as $cartItem) {
                $menu_id = $cartItem->menu_id;
                $newJumlah = $request->input('jumlah_' . $menu_id); // Input name diubah menjadi 'jumlah_{menu_id}'

                // Pastikan input jumlah tidak lebih kecil dari 15
                if ($newJumlah >= 15) {
                    $cartItem->jumlah = $newJumlah;
                    $cartItem->save();
                }
            }

            return redirect()->back()->with('success', 'Menu berhasil dimasukkan ke dalam keranjang.');
        } else {
            return redirect('/login')->with('error', 'Silahkan melakukan login terlebih dahulu');
        }
    }

    public function updateJumlah(Request $request)
    {
        if (Auth::check()) {
            // Mendapatkan user yang sedang terautentikasi (login)
            $user = Auth::user();

            // Mendapatkan semua cart items untuk user yang sedang terautentikasi
            $cart = $user->cart;

            // Jika cart kosong, tampilkan pesan error dan kembalikan pengguna ke halaman Cart
            if ($cart->isEmpty()) {
                return redirect()->back()->with('gagal', 'Keranjang belanja Anda kosong. Silakan tambahkan menu ke keranjang.');
            }

            // Ambil data jumlah menu dari input form yang dikirim dari halaman Checkout
            $inputJumlah = $request->input('jumlah');

            // Loop melalui data jumlah menu yang dikirim
            foreach ($inputJumlah as $cartId => $jumlah) {
                // Cari cart item berdasarkan cartId yang dikirim
                $cartItem = $cart->where('id', $cartId)->first();

                if ($cartItem) {
                    // Update jumlah menu pada cart item
                    $cartItem->jumlah = $jumlah;
                    $cartItem->save();
                }
            }

            // Redirect kembali ke halaman Cart atau halaman Checkout jika ada halaman itu sendiri
            return redirect('/checkout');
        } else {
            return redirect('/login')->with('error', 'Silahkan melakukan login terlebih dahulu');
        }
    }

    public function removeCartItem($id)
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $cartItem = Cart::where('id', $id)
                ->where('user_id', $user_id)
                ->first();

            if ($cartItem) {
                $cartItem->delete();
                return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
            } else {
                return redirect()->back()->with('error', 'Item tidak ditemukan dalam keranjang.');
            }
        } else {
            return redirect('/login')->with('error', 'Silahkan melakukan login terlebih dahulu');
        }
    }

    public function checkoutPesanan(Request $request)
    {
        // Validasi input dari halaman checkout jika diperlukan
        $request->validate([
            'telepon' => 'required',
            'alamat' => 'required|string',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
        ]);

        // Mendapatkan data user yang sedang terautentikasi (login)
        $user = Auth::user();
        $user_id = $user->id;

        // Mendapatkan semua cart items untuk user yang sedang terautentikasi dengan eager loading menu
        $cartItems = Cart::with('menu')->where('user_id', $user_id)->get();

        // Cek apakah keranjang belanja kosong
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong. Silakan tambahkan menu ke keranjang.');
        }

        // Hitung total harga dari keranjang belanja
        $totalHarga = 0;
        foreach ($cartItems as $cartItem) {
            $subtotal = $cartItem->menu->harga * $cartItem->jumlah;
            $totalHarga += $subtotal;
        }

        // Hitung total harga pesanan termasuk ongkos kirim (jika diperlukan)
        $totalHargaPesanan = $totalHarga + $request->input('ongkos_kirim');

        // Buat pesanan baru di tabel "pesanans"
        $pesanan = new Pesanan();
        $pesanan->user_id = $user_id;
        $pesanan->nomor_pesanan = "#" . $user_id . "-" . strtoupper(bin2hex(random_bytes(2)));
        $pesanan->midtrans_id = "DP-" . time() . "-" . bin2hex(random_bytes(4));
        $pesanan->alamat_pengiriman = $request->input('alamat');
        $pesanan->keterangan_pengiriman = $request->input('keterangan');
        $pesanan->harga_pengiriman = $request->input('ongkos_kirim');
        $pesanan->total_harga = $totalHargaPesanan;
        $pesanan->status_pesanan = 'Belum Dibayar';
        $pesanan->tanggal_pesanan_dibuat = now(); // Tanggal pesanan dibuat saat ini
        $pesanan->tanggal_pesanan_dikirim = $request->input('tanggal');
        $pesanan->jam_pesanan_dikirim = $request->input('jam');
        $pesanan->save();

        // Simpan detail pesanan dalam tabel "detail_pesanans"
        foreach ($cartItems as $cartItem) {
            $detailPesanan = new DetailPesanan();
            $detailPesanan->menu_id = $cartItem->menu_id;
            $detailPesanan->pesanan_id = $pesanan->id;
            $detailPesanan->jumlah = $cartItem->jumlah;
            $detailPesanan->harga = $cartItem->menu->harga * $cartItem->jumlah;
            $detailPesanan->save();
        }

        // Hapus semua cart items setelah berhasil checkout
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        $pesananId = $pesanan->id;

        // Redirect ke halaman terima kasih atau halaman sukses checkout
        return redirect('/payment-dp/' . $pesananId)->with('success', 'Pesanan berhasil dibuat. Silakan lakukan pembayaran.');
    }

    public function paymentDp($id)
    {
        $user = Auth::user();

        $pesanan = Pesanan::findOrFail($id);


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $harga_dp = round($pesanan->total_harga / 2);

        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan->midtrans_id,
                'gross_amount' => $harga_dp,
            ),
            'customer_details' => array(
                'name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->telepon,
            ),
        );


        $snapToken = \Midtrans\Snap::getSnapToken($params);

        if (!$snapToken) {
            redirect()->back()->with('error', 'Token pembayaran tidak ditemukan, silahkan coba lagi!');
        }

        return view('wargoCatering.paymentDp', [
            'pesanan' => $pesanan,
            'snapToken' => $snapToken
        ]);
    }


    public function paymentPelunasan($id)
    {
        $user = Auth::user();

        $pesanan = Pesanan::findOrFail($id);


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $hargaPelunasan = round($pesanan->total_harga / 2);

        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan->midtrans_id,
                'gross_amount' => $hargaPelunasan,
            ),
            'customer_details' => array(
                'name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->telepon,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        if (!$snapToken) {
            redirect()->back()->with('error', 'Token pembayaran tidak ditemukan, silahkan coba lagi!');
        }

        return view('wargoCatering.paymentPelunasan', [
            'pesanan' => $pesanan,
            'snapToken' => $snapToken
        ]);
    }


    public function midtransCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            $midtransOrderID = $request->order_id;
            $pesanan = Pesanan::where('midtrans_id', $midtransOrderID)->first();

            if ($pesanan->status_pesanan == 'Belum Dibayar') {
                $pesanan->update(['status_pesanan' => 'Menunggu Pelunasan']);
                $midtransId = "PELUNASAN-" . time() . "-" . bin2hex(random_bytes(4));
                $pesanan->update(['midtrans_id' => $midtransId]);
            } else {
                $pesanan->update(['status_pesanan' => 'Lunas']);
            }
        }
    }
}
