<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\penjualan_controller;
use App\Http\Controllers\DataSampah_Controller;
use App\Http\Controllers\Transaksi_controller;
use App\Http\Controllers\dashboard_controller;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/prov', [dashboard_controller::class, 'provinsi'])->name('provinsi');


// Group untuk role 1
Route::middleware(['auth', 'role:1'])->group(function () {
    // penjualan sampah
    Route::get('/penjualan', [Penjualan_Controller::class, 'penjualan'])->name('penjualan');
    Route::post('/penjualan/store', [Penjualan_Controller::class, 'store'])->name('storepenjualan');
    Route::get('/get-nama-sampah/{jenis_sampah}', [Penjualan_Controller::class, 'getNamaSampah'])->name('getNamaSampah');

    // data sampah
    // Route::get('/data_sampah', [DataSampah_Controller::class, 'index'])->name('DataSampah');
    Route::get('/tambahSampah', [DataSampah_Controller::class, 'tambahsampah'])->name('TambahSampah');
    Route::post('/storesampah', [DataSampah_Controller::class, 'storesampah'])->name('Storesampah');
    Route::get('/data_sampah/{id}/edit', [DataSampah_Controller::class, 'editsampah'])->name('EditSampah');
    Route::put('/data_sampah/{id}', [DataSampah_Controller::class, 'updatesampah'])->name('UpdateSampah');
    Route::delete('/data_sampah/delete/{id}', [DataSampah_Controller::class, 'deletesampah']);

    // transaksi penarikan saldo
    Route::get('/transaksi', [Transaksi_Controller::class, 'index'])->name('Transaksi');
    Route::put('/transaksi/{id}', [Transaksi_Controller::class, 'accsaldo'])->name('accsaldo');
    Route::get('/check-and-update-withdrawals', [Transaksi_controller::class, 'checkAndUpdateWithdrawals'])->name('checkAndUpdateWithdrawals');

});

// Group untuk role 2
Route::middleware(['auth', 'role:2'])->group(function () {

    // data sampah
    
    //history penjualan
    Route::get('/historypenjualan', [Penjualan_Controller::class, 'riwayatpenjualan'])->name('History');

    // penarikan saldo
    Route::get('/saldo', [Transaksi_controller::class, 'tariksaldo'])->name('tariksaldo');
    Route::post('/tarik_saldo', [Transaksi_controller::class, 'saldostore'])->name('saldostore');
    Route::get('/riwayat_penarikan', [Transaksi_controller::class, 'riwayat_penarikan'])->name('riwayat_penarikan');
});

Route::middleware(['auth', 'role:1,2'])->group(function () { 
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //dashboard
    Route::get('/dashboard', [dashboard_controller::class, 'index'])->name('dashboard');

    Route::get('/data_sampah', [DataSampah_Controller::class, 'index'])->name('DataSampah');
});

Route::fallback(function () {
    return view('404');
});

require __DIR__ . '/auth.php';
