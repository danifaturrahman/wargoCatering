<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alat;
use App\Models\DetailPeminjamanAlat;
use App\Models\FAQ;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\OngkosKirim;
use App\Models\PeminjamanAlat;
use App\Models\Pesanan;
use App\Models\PesanKritik;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminWargoCateringController extends Controller
{
    // DASHBOARD

    public function dashboard()
    {
        return view('adminWargoCatering.dashboard');
    }

    // KATEGORI KATERING

    public function kategoriKatering()
    {
        $kategori = Kategori::all();

        return view('adminWargoCatering.kategoriKatering', [
            'kategori' => $kategori
        ]);
    }

    public function createKategoriKatering()
    {
        return view('adminWargoCatering.Create.kategoriKateringCreate');
    }

    public function storeKategoriKatering(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048'
        ]);

        $validatedData['gambar'] = $request->file('gambar')->store('images');

        Kategori::create($validatedData);

        return redirect('/dashboard/kategori-katering')->with('success', 'Kategori Katering baru berhasil ditambahkan!');
    }

    public function editKategoriKatering($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('adminWargoCatering.Edit.kategoriKateringEdit', [
            'kategori' => $kategori
        ]);
    }

    public function updateKategoriKatering(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('images');
        }

        Kategori::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/kategori-katering')->with('success', 'Kategori Katering berhasil di update!');
    }

    public function destroyKategoriKatering($id)
    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori->gambar) {
            Storage::delete($kategori->gambar);
        }

        Kategori::where('id', $id)->delete();
        return redirect('/dashboard/kategori-katering')->with('success', 'Kategori Katering berhasil dihapus!');
    }

    // MENU KATERING

    public function menuKatering()
    {
        $menu = Menu::all();

        return view('adminWargoCatering.menuKatering', [
            'menu' => $menu
        ]);
    }

    public function showMenuKatering()
    {
        return view('adminWargoCatering.Show.menuKateringShow');
    }

    public function createMenuKatering()
    {
        $kategori = Kategori::all();

        return view('adminWargoCatering.Create.menuKateringCreate', [
            'kategori' => $kategori
        ]);
    }

    public function storeMenuKatering(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar' => 'image|required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        $validatedData['gambar'] = $request->file('gambar')->store('images');

        Menu::create($validatedData);

        return redirect('/dashboard/menu-katering')->with('success', 'Menu Katering Baru Berhasil Ditambahkan!');
    }

    public function editMenuKatering($id)
    {
        $kategori = Kategori::all();
        $menu = Menu::findOrFail($id);
        return view('adminWargoCatering.Edit.MenuKateringEdit', [
            'menu' => $menu,
            'kategori' => $kategori
        ]);
    }

    public function updateMenuKatering(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar' => 'image',
            'kategori_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('images');
        }

        Menu::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/menu-katering')->with('success', 'Menu Katering berhasil di update!');
    }

    public function destroyMenuKatering($id)
    {
        $menu = Menu::findOrFail($id);
        if ($menu->gambar) {
            Storage::delete($menu->gambar);
        }

        Menu::where('id', $id)->delete();
        return redirect('/dashboard/menu-katering')->with('success', 'Menu Katering berhasil dihapus!');
    }

    // ALAT KATERING

    public function alatKatering()
    {
        $alat = Alat::all();

        return view('adminWargoCatering.alatKatering', [
            'alat' => $alat
        ]);
    }

    public function createAlatKatering()
    {
        return view('adminWargoCatering.Create.alatKateringCreate');
    }

    public function storeAlatKatering(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar' => 'image|required',
            'jumlah' => 'required',
        ]);

        $validatedData['gambar'] = $request->file('gambar')->store('images');

        Alat::create($validatedData);

        return redirect('/dashboard/alat-katering')->with('success', 'Kategori Katering Baru Berhasil Ditambahkan!');
    }

    public function editAlatKatering($id)
    {
        $alat = Alat::findOrFail($id);
        return view('adminWargoCatering.Edit.AlatKateringEdit', [
            'alat' => $alat,
        ]);
    }

    public function updateAlatKatering(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar' => 'image',
            'jumlah' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('images');
        }

        Alat::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/alat-katering')->with('success', 'Alat Katering berhasil di update!');
    }

    public function destroyAlatKatering($id)
    {
        $alat = Alat::findOrFail($id);
        if ($alat->gambar) {
            Storage::delete($alat->gambar);
        }

        Alat::where('id', $id)->delete();
        return redirect('/dashboard/alat-katering')->with('success', 'Alat Katering berhasil dihapus!');
    }


    // ONGKOS KIRIM

    public function ongkosKirim()
    {
        $ongkir = OngkosKirim::all();

        return view('adminWargoCatering.ongkosKirim', [
            'ongkir' => $ongkir
        ]);
    }

    public function createOngkosKirim()
    {
        return view('adminWargoCatering.Create.ongkosKirimCreate');
    }

    public function storeOngkosKirim(Request $request)
    {
        $validatedData = $request->validate([
            'daerah' => 'required',
            'harga_ongkir' => 'required'
        ]);


        OngkosKirim::create($validatedData);

        return redirect('/dashboard/ongkos-kirim')->with('success', 'Ongkos Kirim baru berhasil ditambahkan!');
    }


    public function editOngkosKirim($id)
    {
        $ongkir = OngkosKirim::findOrFail($id);
        return view('adminWargoCatering.Edit.OngkosKirimEdit', [
            'ongkir' => $ongkir,
        ]);
    }

    public function updateOngkosKirim(Request $request, $id)
    {
        $validatedData = $request->validate([
            'daerah' => 'required',
            'harga_ongkir' => 'required'
        ]);

        OngkosKirim::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/ongkos-kirim')->with('success', 'Ongkos Kirim berhasil di update!');
    }

    public function destroyOngkosKirim($id)
    {
        $ongkir = OngkosKirim::findOrFail($id);
        if ($ongkir->gambar) {
            Storage::delete($ongkir->gambar);
        }

        OngkosKirim::where('id', $id)->delete();
        return redirect('/dashboard/ongkos-kirim')->with('success', 'Ongkos Kirim berhasil dihapus!');
    }


    // FAQ

    public function faq()
    {
        $faq = FAQ::all();

        return view('adminWargoCatering.faq', [
            'faq' => $faq
        ]);
    }

    public function createFaq()
    {
        return view('adminWargoCatering.Create.faqCreate');
    }

    public function storeFaq(Request $request)
    {
        $validatedData = $request->validate([
            'pertanyaan' => 'required|string',
            'deskripsi' => 'required|string'
        ]);


        FAQ::create($validatedData);

        return redirect('/dashboard/faq')->with('success', 'FAQ baru berhasil ditambahkan!');
    }


    public function editFaq($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('adminWargoCatering.Edit.faqEdit', [
            'faq' => $faq,
        ]);
    }

    public function updateFaq(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pertanyaan' => 'required|string',
            'deskripsi' => 'required|string'
        ]);

        FAQ::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/faq')->with('success', 'FAQ berhasil di update!');
    }

    public function destroyFaq($id)
    {
        FAQ::where('id', $id)->delete();
        return redirect('/dashboard/faq')->with('success', 'FAQ berhasil dihapus!');
    }


    // PESANAN PELANGGAN

    public function pesananPelanggan()
    {
        $pesanan = Pesanan::orderBy('id', 'desc')->get();

        return view('adminWargoCatering.pesananPelanggan', [
            'pesanan' => $pesanan
        ]);
    }

    public function showPesananPelanggan($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $tanggal_transaksi = Carbon::parse($pesanan->tanggal_pesanan_dibuat)->isoFormat('dddd, DD MMMM YYYY');
        $tanggal_dikirim = Carbon::parse($pesanan->tanggal_pesanan_dikirim)->isoFormat('dddd, DD MMMM YYYY');

        return view('adminWargoCatering.Show.pesananPelangganShow', [
            'pesanan' => $pesanan,
            'tanggal_transaksi' => $tanggal_transaksi,
            'tanggal_dikirim' => $tanggal_dikirim,
        ]);
    }


    public function updateStatusSelesai($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        if ($pesanan->status_pesanan !== 'Selesai') {
            $pesanan->status_pesanan = 'Selesai';
            $pesanan->save();

            return redirect('/dashboard/pesanan-pelanggan')->with('success', 'Status pesanan berhasil diubah menjadi Selesai.');
        } else {
            return redirect('/dashboard/pesanan-pelanggan')->with('error', 'Status pesanan sudah berada dalam keadaan Selesai.');
        }
    }

    // DATA PELANGGAN

    public function dataPelanggan()
    {
        $pelanggan = User::all();

        return view('adminWargoCatering.dataPelanggan', [
            'pelanggan' => $pelanggan
        ]);
    }

    // LAPORAN TRANSAKSI

    public function laporanTransaksi(Request $request)
    {
        $startDate = $request->input('start_date', now()->subMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->format('Y-m-d'));

        $laporan = Pesanan::where('status_pesanan', 'Lunas')
            ->whereBetween('tanggal_pesanan_dibuat', [$startDate, $endDate])
            ->get();

        return view('adminWargoCatering.laporanTransaksi', [
            'laporan' => $laporan,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }

    // PEMINJAMAN ALAT

    public function peminjamanAlat()
    {
        $peminjamanAlat = PeminjamanAlat::orderBy('created_at', 'desc')->get();


        return view('adminWargoCatering.peminjamanAlat', [
            'peminjamanAlat' => $peminjamanAlat
        ]);
    }

    public function showPeminjamanAlat($pesanan_id)
    {
        $peminjaman = PeminjamanAlat::findOrFail($pesanan_id);

        return view('adminWargoCatering.Show.peminjamanAlatShow', [
            'peminjaman' => $peminjaman
        ]);
    }

    public function createPeminjamanAlat()
    {
        $alat = Alat::all();
        $pesanan = Pesanan::all();

        return view('adminWargoCatering.Create.peminjamanAlatCreate', [
            'alat' => $alat,
            'pesanan' => $pesanan
        ]);
    }

    public function storePeminjamanAlat(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required',
            'alat.*' => 'integer|min:1',
        ]);

        // Simpan data ke dalam tabel peminjaman_alat
        $peminjaman = PeminjamanAlat::create([
            'pesanan_id' => $request->input('pesanan_id'),
        ]);

        // Simpan data peminjaman alat ke dalam tabel detail_peminjaman_alat
        foreach ($request->input('alat') as $alatId => $jumlah) {
            if ($jumlah > 0) {
                $alat = Alat::findOrFail($alatId);
                DetailPeminjamanAlat::create([
                    'peminjaman_alat_id' => $peminjaman->id,
                    'nama_alat' => $alat->nama,
                    'jumlah' => $jumlah,
                ]);
            }
        }

        return redirect('dashboard/peminjaman-alat')->with('success', 'Peminjaman alat berhasil ditambahkan');
    }

    public function updatePeminjamanAlat(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'catatan' => '',
        ]);

        PeminjamanAlat::where('id', $id)
            ->update([
                'status' => $validatedData['status'],
                'catatan' => $validatedData['catatan'],
            ]);

        return redirect()->back()->with('success', 'Status pengembalian berhasil diubah');
    }

    //KRITIK SARAN

    public function pesanKritik()
    {
        $pesanKritik = PesanKritik::all();

        return view('adminWargoCatering.pesanKritik', [
            'pesanKritik' => $pesanKritik
        ]);
    }
}
