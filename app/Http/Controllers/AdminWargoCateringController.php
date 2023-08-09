<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;

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

    public function kategoriKateringCreate()
    {
        return view('adminWargoCatering.Create.kategoriKateringCreate');
    }

    public function storeKategoriKatering(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar' => 'image|required'
        ]);

        $validatedData['gambar'] = $request->file('gambar')->store('images');

        Kategori::create($validatedData);

        return redirect('/dashboard/kategori-katering')->with('success', 'Kategori Katering Baru Berhasil Ditambahkan!');
    }

    // MENU KATERING

    public function menuKatering()
    {
        $menu = Menu::all();

        return view('adminWargoCatering.menuKatering', [
            'menu' => $menu
        ]);
    }

    public function menuKateringCreate()
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

    // ALAT KATERING

    public function alatKatering()
    {
        $alat = Alat::all();

        return view('adminWargoCatering.alatKatering', [
            'alat' => $alat
        ]);
    }

    public function alatKateringCreate()
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
