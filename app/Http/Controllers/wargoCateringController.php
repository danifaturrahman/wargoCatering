<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailPesanan;
use App\Models\FAQ;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\OngkosKirim;
use App\Models\Pesanan;
use App\Models\PesanKritik;
use App\Models\Testimoni;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class wargoCateringController extends Controller
{
    public function coba()
    {
        return view('wargoCatering.coba');
    }

    public function home()
    {
        $faq = FAQ::all();

        $menuTerbaru = Menu::orderByDesc('id')
            ->limit(3) // Ganti dengan jumlah menu terlaris yang ingin ditampilkan
            ->get();


        return view('wargoCatering.home', [
            'faq' => $faq,
            'menuTerbaru' => $menuTerbaru,
        ]);
    }

    public function contact()
    {
        return view('wargoCatering.contact');
    }

    public function menu()
    {
        $kategori = Kategori::all();

        $menuTerlaris = Menu::orderByDesc('jumlah_pesanan')
            ->limit(3) // Ganti dengan jumlah menu terlaris yang ingin ditampilkan
            ->get();

        $menuTerbaru = Menu::orderByDesc('id')
            ->limit(3) // Ganti dengan jumlah menu terlaris yang ingin ditampilkan
            ->get();

        $semuaMenu = Menu::all();

        return view('wargoCatering.menu', [
            'kategori' => $kategori,
            'menuTerlaris' => $menuTerlaris,
            'menuTerbaru' => $menuTerbaru,
            'semuaMenu' => $semuaMenu,
        ]);
    }

    public function detailMenu($id)
    {
        $menu = Menu::find($id);

        if (empty($menu) || empty($menu->kategori_id)) {
            return redirect('/menu')->with('error', 'Menu not found.');
        }

        $kategori = Menu::where('kategori_id', $menu->kategori_id)->get();

        return view('wargoCatering.detail-menu', [
            'menu' => $menu,
            'kategori' => $kategori,
        ]);
    }

    public function testimoni()
    {
        $testimoni = Testimoni::all();

        return view('wargoCatering.testimoni', [
            'testimoni' => $testimoni,
            'convertToStarRating' => function ($rating) {
                $fullStars = str_repeat('★', $rating);
                $emptyStars = str_repeat('☆', 5 - $rating);
                return $fullStars . $emptyStars;
            }
        ]);
    }


    public function storeTestimoni(Request $request)
    {
        $request->validate([
            'ulasan' => 'required',
            'nilai' => 'required|integer|min:1|max:5',
        ]);

        // Simpan penilaian ke database
        Testimoni::create([
            'ulasan' => $request->ulasan,
            'nilai' => $request->nilai,
            'user_id' => auth()->id(),
        ]);

        return redirect('/testimoni')->with('success', 'Penilaian berhasil ditambahkan.');
    }

    public function about()
    {
        return view('wargoCatering.about');
    }

    public function cart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart;

            return view('wargoCatering.cart', [
                'cart' => $cart
            ]);
        } else {
            return redirect('/login')->with('error', 'Silahkan melakukan login terlebih dahulu');
        }
    }

    public function checkout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart;

            $ongkir = OngkosKirim::all();

            if ($cart->isEmpty()) {
                return redirect()->back()->with('gagal', 'Keranjang belanja Anda kosong. Silakan tambahkan menu ke keranjang.');
            }

            return view('wargoCatering.checkout', [
                'cart' => $cart,
                'ongkir' => $ongkir
            ]);
        } else {
            return redirect('/login')->with('error', 'Silahkan melakukan login terlebih dahulu');
        }
    }

    public function kategori($id)
    {
        $kategori = Kategori::find($id);

        return view('wargoCatering.kategori', [
            'kategori' => $kategori
        ]);
    }

    public function userProfile()
    {
        return view('wargoCatering.userProfile');
    }

    public function userOrder()
    {
        $user = Auth::user();

        $pesanan = Pesanan::where('user_id', $user->id)->orderByDesc('id')->get();

        return view('wargoCatering.userOrder', [
            'pesanan' => $pesanan
        ]);
    }

    public function userNotification()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $pesanan_pelanggan = Pesanan::where('user_id', $user_id)->orderByDesc('id')->get();

        foreach ($pesanan_pelanggan as $pesanan_pelanggan) {

            // Pesan notifikasi untuk pesanan dibuat
            if ($pesanan_pelanggan->status_pesanan == 'Belum Dibayar') {
                $pesanDibuat = '<div class="border border-secondary-subtle p-2">';
                $pesanDibuat .= '<p>Pesanan Dibuat - Tanggal Transaksi: ' . Carbon::parse($pesanan_pelanggan->tanggal_pesanan_dibuat)->isoFormat('dddd, DD MMMM YYYY') . '</p>';
                $pesanDibuat .= '<p>Pesanan #' . $pesanan_pelanggan->id . ', Untuk menyelesaikan pesanan Anda, silahkan melakukan pembayaran DP sebesar Rp. ' . number_format($pesanan_pelanggan->harga_dp, 0, ',', '.') . '</p>';
                $pesanDibuat .= '<p><a href="/detail-pesanan-pelanggan" class="border border-success p-1 rounded text-decoration-none">Tampilkan Rincian Pesanan</a></p>';
                $pesanDibuat .= '</div>';

                $notifikasiPesananDibuat[] = $pesanDibuat;
            } elseif ($pesanan_pelanggan->status_pesanan == 'Menunggu Pelunasan') {
                $pesanDibayar = '<div class="border border-secondary-subtle p-2">';
                $pesanDibayar .= '<p>Pesanan Dibayar - Tanggal Transaksi: ' . Carbon::parse($pesanan_pelanggan->tanggal_pesanan_dibuat)->isoFormat('dddd, DD MMMM YYYY') . '</p>';
                $pesanDibayar .= '<p>Pesanan #' . $pesanan_pelanggan->id . ', Untuk menyelesaikan pesanan Anda, silahkan melakukan pembayaran DP sebesar Rp. ' . number_format($pesanan_pelanggan->harga_dp, 0, ',', '.') . '</p>';
                $pesanDibayar .= '<p><a href="/detail-pesanan-pelanggan" class="border border-success p-1 rounded text-decoration-none">Tampilkan Rincian Pesanan</a></p>';
                $pesanDibayar .= '</div>';

                $notifikasiPesananDibayar[] = $pesanDibayar;
            }
        }


        return view('wargoCatering.userNotification', [
            'notifikasiPesananDibuat' => $notifikasiPesananDibuat,
            // 'notifikasiPesananDibayar' => $notifikasiPesananDibayar,
        ]);
    }

    public function invoice($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        // $detail_pesanan = DetailPesanan::where('pesanan_id', $id)->get();
        $tanggal_transaksi = Carbon::parse($pesanan->tanggal_pesanan_dibuat)->isoFormat('dddd, DD MMMM YYYY');
        $tanggal_dikirim = Carbon::parse($pesanan->tanggal_pesanan_dikirim)->isoFormat('dddd, DD MMMM YYYY');
        return view('wargoCatering.invoice', [
            'pesanan' => $pesanan,
            'tanggal_transaksi' => $tanggal_transaksi,
            'tanggal_dikirim' => $tanggal_dikirim
        ]);
    }

    public function storeContact(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // Simpan penilaian ke database
        PesanKritik::create($validatedData);

        return redirect('/contact')->with('success', 'Pesan kritik atau saran berhasil dikirimkan.');
    }
}
