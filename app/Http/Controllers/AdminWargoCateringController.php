<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\OngkosKirim;
use App\Models\Pesanan;
use App\Models\User;
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
            'gambar' => 'image|required'
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


    // PESANAN PELANGGAN

    public function pesananPelanggan()
    {
        $pesanan = Pesanan::all();

        return view('adminWargoCatering.pesananPelanggan', [
            'pesanan' => $pesanan
        ]);
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

    public function laporanTransaksi()
    {
        return view('adminWargoCatering.laporanTransaksi');
    }
}
