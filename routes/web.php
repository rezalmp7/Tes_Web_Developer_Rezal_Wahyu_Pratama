<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DataProdukController;
use App\Http\Controllers\DataPesananController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'registerStore']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/detail/{id}', [ProdukController::class, 'detail']);

Route::group(['middleware' => ['cekLevel:customer']], function() {
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/keranjang/add/{id}', [KeranjangController::class, 'add']);
    Route::post('/keranjang/update', [KeranjangController::class, 'update']);
    Route::get('/keranjang/store', [KeranjangController::class, 'store']);
    Route::get('/keranjang/delete/{id}', [KeranjangController::class, 'delete']);
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detail']);
});

Route::group(['middleware' => ['cekLevel:admin']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/user', UserController::class);
    Route::resource('/kustomer', KustomerController::class);
    Route::resource('/dataProduk', DataProdukController::class);
    Route::resource('/dataPesanan', DataPesananController::class);
});

