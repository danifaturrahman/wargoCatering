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
Route::get('/detail-menu/{id}', [wargoCateringController::class, 'detailMenu']);
Route::get('/contact', [wargoCateringController::class, 'contact']);
Route::get('/testimoni', [wargoCateringController::class, 'testimoni']);
Route::get('/about', [wargoCateringController::class, 'about']);
Route::get('/cart', [wargoCateringController::class, 'cart']);

// Rute untuk halaman Pelanggan
Route::group(['middleware' => ['auth', 'Pelanggan']], function () {

    Route::get('/checkout', [wargoCateringController::class, 'checkout']);
    Route::get('/kategori/{id}', [wargoCateringController::class, 'kategori']);
    Route::get('/user-dashboard-profile', [wargoCateringController::class, 'userProfile']);
    Route::get('/user-dashboard-order', [wargoCateringController::class, 'userOrder']);
    Route::get('/user-dashboard-notification', [wargoCateringController::class, 'userNotification']);
    Route::get('/invoice/{id}', [wargoCateringController::class, 'invoice']);

    // PROSES PESANAN
    Route::post('/add-to-cart', [PesananController::class, 'addToCart']);
    Route::post('/update-jumlah', [PesananController::class, 'updateJumlah']);
    Route::get('/cart/remove/{id}', [PesananController::class, 'removeCartItem']);
    Route::post('/checkout-pesanan', [PesananController::class, 'checkoutPesanan']);
    Route::get('/payment-dp/{id}', [PesananController::class, 'paymentDp']);
    Route::get('/payment-pelunasan/{id}', [PesananController::class, 'paymentPelunasan']);
});


// Rute untuk halaman Admin
Route::group(['middleware' => ['auth', 'Admin']], function () {
    /* Table View */

    Route::get('/dashboard', [AdminWargoCateringController::class, 'dashboard']);
    Route::get('/dashboard/kategori-katering', [AdminWargoCateringController::class, 'kategoriKatering']);
    Route::get('/dashboard/menu-katering', [AdminWargoCateringController::class, 'menuKatering']);
    Route::get('/dashboard/alat-katering', [AdminWargoCateringController::class, 'alatKatering']);
    Route::get('/dashboard/pesanan-pelanggan', [AdminWargoCateringController::class, 'pesananPelanggan']);
    Route::get('/dashboard/data-pelanggan', [AdminWargoCateringController::class, 'dataPelanggan']);
    Route::get('/dashboard/laporan-transaksi', [AdminWargoCateringController::class, 'laporanTransaksi']);
    Route::get('/dashboard/laporan-transaksi', [AdminWargoCateringController::class, 'laporanTransaksi']);

    /* Create View */

    Route::get('/dashboard/kategori-katering/create', [AdminWargoCateringController::class, 'kategoriKateringCreate']);
    Route::get('/dashboard/menu-katering/create', [AdminWargoCateringController::class, 'menuKateringCreate']);
    Route::get('/dashboard/alat-katering/create', [AdminWargoCateringController::class, 'alatKateringCreate']);
    Route::get('/dashboard/pesanan-pelanggan/create', [AdminWargoCateringController::class, 'pesananPelangganCreate']);
    Route::get('/dashboard/data-pelanggan/create', [AdminWargoCateringController::class, 'dataPelangganCreate']);
    Route::get('/dashboard/laporan-transaksi/create', [AdminWargoCateringController::class, 'laporanTransaksiCreate']);

    /* Form Post */

    Route::post('/dashboard/kategori-katering', [AdminWargoCateringController::class, 'storeKategoriKatering']);
    Route::post('/dashboard/menu-katering', [AdminWargoCateringController::class, 'storeMenuKatering']);
    Route::post('/dashboard/alat-katering', [AdminWargoCateringController::class, 'storeAlatKatering']);
    Route::post('/dashboard/pesanan-pelanggan', [AdminWargoCateringController::class, 'storePesananPelanggan']);
    Route::post('/dashboard/data-pelanggan', [AdminWargoCateringController::class, 'storeDataPelanggan']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
