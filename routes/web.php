<?php

use App\Http\Controllers\AdminWargoCateringController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\wargoCateringController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/coba', [wargoCateringController::class, 'coba']);

//Rute untuk user bebas
Route::get('/home', [wargoCateringController::class, 'home']);
Route::get('/', [wargoCateringController::class, 'home']);
Route::get('/menu', [wargoCateringController::class, 'menu']);
Route::get('/kategori/{id}', [wargoCateringController::class, 'kategori']);
Route::get('/detail-menu/{id}', [wargoCateringController::class, 'detailMenu']);
Route::get('/contact', [wargoCateringController::class, 'contact']);
Route::get('/testimoni', [wargoCateringController::class, 'testimoni']);
Route::get('/about', [wargoCateringController::class, 'about']);

// Rute untuk halaman Pelanggan
Route::group(['middleware' => ['auth', 'Pelanggan']], function () {

    Route::get('/checkout', [wargoCateringController::class, 'checkout']);
    Route::get('/user-dashboard-profile', [wargoCateringController::class, 'userProfile']);
    Route::get('/user-dashboard-order', [wargoCateringController::class, 'userOrder']);
    Route::get('/user-dashboard-notifikasi', [wargoCateringController::class, 'userNotification']);
    Route::get('/invoice/{id}', [wargoCateringController::class, 'invoice']);
    Route::get('/cart', [wargoCateringController::class, 'cart']);

    // PROSES PESANAN
    Route::post('/add-to-cart', [PesananController::class, 'addToCart']);
    Route::post('/update-jumlah', [PesananController::class, 'updateJumlah']);
    Route::get('/cart/remove/{id}', [PesananController::class, 'removeCartItem']);
    Route::post('/checkout-pesanan', [PesananController::class, 'checkoutPesanan']);
    Route::get('/payment-dp/{id}', [PesananController::class, 'paymentDp']);
    Route::get('/payment-pelunasan/{id}', [PesananController::class, 'paymentPelunasan']);

    //TESTIMONI
    Route::post('/testimoni', [wargoCateringController::class, 'storeTestimoni']);

    //CONTACT
    Route::post('/contact', [wargoCateringController::class, 'storeContact']);
});


// Rute untuk halaman Admin
Route::group(['middleware' => ['auth', 'Admin']], function () {

    /* Table View */

    Route::get('/dashboard', [AdminWargoCateringController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/kategori-katering', [AdminWargoCateringController::class, 'kategoriKatering']);
    Route::get('/dashboard/menu-katering', [AdminWargoCateringController::class, 'menuKatering']);
    Route::get('/dashboard/alat-katering', [AdminWargoCateringController::class, 'alatKatering']);
    Route::get('/dashboard/ongkos-kirim', [AdminWargoCateringController::class, 'ongkosKirim']);
    Route::get('/dashboard/pesanan-pelanggan', [AdminWargoCateringController::class, 'pesananPelanggan']);
    Route::get('/dashboard/data-pelanggan', [AdminWargoCateringController::class, 'dataPelanggan']);
    Route::get('/dashboard/laporan-transaksi', [AdminWargoCateringController::class, 'laporanTransaksi']);
    Route::get('/dashboard/peminjaman-alat', [AdminWargoCateringController::class, 'peminjamanAlat']);
    Route::get('/dashboard/faq', [AdminWargoCateringController::class, 'faq']);
    Route::get('/dashboard/pesan-kritik', [AdminWargoCateringController::class, 'pesanKritik']);

    /* Show View */
    Route::get('/dashboard/kategori-katering/{id}/show', [AdminWargoCateringController::class, 'showKategoriKatering']);
    Route::get('/dashboard/menu-katering/{id}/show', [AdminWargoCateringController::class, 'showMenuKatering']);
    Route::get('/dashboard/alat-katering/{id}/show', [AdminWargoCateringController::class, 'showAlatKatering']);
    Route::get('/dashboard/ongkos-kirim/{id}/show', [AdminWargoCateringController::class, 'showOngkosKirim']);
    Route::get('/dashboard/pesanan-pelanggan/{id}/show', [AdminWargoCateringController::class, 'showPesananPelanggan']);
    Route::get('/dashboard/data-pelanggan/{id}/show', [AdminWargoCateringController::class, 'showDataPelanggan']);
    Route::get('/dashboard/peminjaman-alat/{id}/show', [AdminWargoCateringController::class, 'showPeminjamanAlat']);
    Route::get('/dashboard/faq/{id}/show', [AdminWargoCateringController::class, 'showFaq']);

    /* Create View */

    Route::get('/dashboard/kategori-katering/create', [AdminWargoCateringController::class, 'createKategoriKatering']);
    Route::get('/dashboard/menu-katering/create', [AdminWargoCateringController::class, 'createMenuKatering']);
    Route::get('/dashboard/alat-katering/create', [AdminWargoCateringController::class, 'createAlatKatering']);
    Route::get('/dashboard/ongkos-kirim/create', [AdminWargoCateringController::class, 'createOngkosKirim']);
    Route::get('/dashboard/pesanan-pelanggan/create', [AdminWargoCateringController::class, 'createPesananPelanggan']);
    Route::get('/dashboard/data-pelanggan/create', [AdminWargoCateringController::class, 'createDataPelanggan']);
    Route::get('/dashboard/laporan-transaksi/create', [AdminWargoCateringController::class, 'createLaporanTransaksi']);
    Route::get('/dashboard/peminjaman-alat/create', [AdminWargoCateringController::class, 'createPeminjamanAlat']);
    Route::get('/dashboard/faq/create', [AdminWargoCateringController::class, 'createFaq']);

    /* Form Post Store */

    Route::post('/dashboard/kategori-katering', [AdminWargoCateringController::class, 'storeKategoriKatering']);
    Route::post('/dashboard/menu-katering', [AdminWargoCateringController::class, 'storeMenuKatering']);
    Route::post('/dashboard/alat-katering', [AdminWargoCateringController::class, 'storeAlatKatering']);
    Route::post('/dashboard/ongkos-kirim', [AdminWargoCateringController::class, 'storeOngkosKirim']);
    Route::post('/dashboard/pesanan-pelanggan', [AdminWargoCateringController::class, 'storePesananPelanggan']);
    Route::post('/dashboard/data-pelanggan', [AdminWargoCateringController::class, 'storeDataPelanggan']);
    Route::post('/dashboard/peminjaman-alat', [AdminWargoCateringController::class, 'storePeminjamanAlat']);
    Route::post('/dashboard/faq', [AdminWargoCateringController::class, 'storeFaq']);

    /* Edit View */

    Route::get('/dashboard/kategori-katering/{id}/edit', [AdminWargoCateringController::class, 'editKategoriKatering']);
    Route::get('/dashboard/menu-katering/{id}/edit', [AdminWargoCateringController::class, 'editMenuKatering']);
    Route::get('/dashboard/alat-katering/{id}/edit', [AdminWargoCateringController::class, 'editAlatKatering']);
    Route::get('/dashboard/ongkos-kirim/{id}/edit', [AdminWargoCateringController::class, 'editOngkosKirim']);
    Route::get('/dashboard/pesanan-pelanggan/{id}/edit', [AdminWargoCateringController::class, 'editPesananPelanggan']);
    Route::get('/dashboard/data-pelanggan/{id}/edit', [AdminWargoCateringController::class, 'editDataPelanggan']);
    Route::get('/dashboard/laporan-transaksi/{id}/edit', [AdminWargoCateringController::class, 'editLaporanTransaksi']);
    Route::get('/dashboard/faq/{id}/edit', [AdminWargoCateringController::class, 'editFaq']);

    /* Form Put Update */

    Route::put('/dashboard/kategori-katering/{id}', [AdminWargoCateringController::class, 'updateKategoriKatering']);
    Route::put('/dashboard/menu-katering/{id}', [AdminWargoCateringController::class, 'updateMenuKatering']);
    Route::put('/dashboard/alat-katering/{id}', [AdminWargoCateringController::class, 'updateAlatKatering']);
    Route::put('/dashboard/ongkos-kirim/{id}', [AdminWargoCateringController::class, 'updateOngkosKirim']);
    Route::put('/dashboard/pesanan-pelanggan/{id}', [AdminWargoCateringController::class, 'updatePesananPelanggan']);
    Route::put('/dashboard/data-pelanggan/{id}', [AdminWargoCateringController::class, 'updateDataPelanggan']);
    Route::put('/dashboard/laporan-transaksi/{id}', [AdminWargoCateringController::class, 'updateLaporanTransaksi']);
    Route::put('/dashboard/peminjaman-alat/{id}', [AdminWargoCateringController::class, 'updatePeminjamanAlat']);
    Route::put('/dashboard/faq/{id}', [AdminWargoCateringController::class, 'updateFaq']);

    /* Form Delete */

    Route::delete('/dashboard/kategori-katering/{id}', [AdminWargoCateringController::class, 'destroyKategoriKatering']);
    Route::delete('/dashboard/menu-katering/{id}', [AdminWargoCateringController::class, 'destroyMenuKatering']);
    Route::delete('/dashboard/alat-katering/{id}', [AdminWargoCateringController::class, 'destroyAlatKatering']);
    Route::delete('/dashboard/ongkos-kirim/{id}', [AdminWargoCateringController::class, 'destroyOngkosKirim']);
    Route::delete('/dashboard/pesanan-pelanggan/{id}', [AdminWargoCateringController::class, 'destroyPesananPelanggan']);
    Route::delete('/dashboard/data-pelanggan/{id}', [AdminWargoCateringController::class, 'destroyDataPelanggan']);
    Route::delete('/dashboard/laporan-transaksi/{id}', [AdminWargoCateringController::class, 'destroyLaporanTransaksi']);
    Route::delete('/dashboard/faq/{id}', [AdminWargoCateringController::class, 'destroyFaq']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
