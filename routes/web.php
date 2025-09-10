<?php

use App\Http\Controllers\AsetController;
use App\Models\Asset;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\JenisBController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetBidangController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('isLogin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');
});

Route::middleware('checkLogin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    
    Route::get('/assetbidang', [AssetBidangController::class, 'index'])->name('assetBidangIndex');
    Route::get('/assetbidang/create', [AssetBidangController::class, 'create'])->name('assetBidangCreate');
    Route::post('/assetbidang/store', [AssetBidangController::class, 'store'])->name('assetBidangStore');
    Route::get('/assetbidang/edit/{id}', [AssetBidangController::class, 'edit'])->name('assetBidangEdit');
    Route::post('/assetbidang/update/{id}', [AssetBidangController::class, 'update'])->name('assetBidangUpdate');
    Route::delete('/assetbidang/delete/{id}', [AssetBidangController::class, 'destroy'])->name('assetBidangDelete');
    Route::get('/assetbidang/excel', [AssetBidangController::class, 'excel'])->name('assetBidangExcel');
    Route::get('/assetbidang/pdf', [AssetBidangController::class, 'pdf'])->name('assetBidangPdf');

    Route::get('/assetsaya', [AsetController::class, 'index'])->name('assetsaya');
        Route::get('/assetsaya/create', [AsetController::class, 'create'])->name('assetsayaCreate');
        Route::post('/assetsaya/store', [AsetController::class, 'store'])->name('assetsayaStore');
        Route::get('/assetsaya/edit/{id}', [AsetController::class, 'edit'])->name('assetsayaEdit');
        Route::post('/assetsaya/update/{id}', [AsetController::class, 'update'])->name('assetsayaUpdate');
        Route::post('/assetsaya/destroy/{id}', [AsetController::class, 'destroy'])->name('assetsayaDestroy');

    Route::middleware('isAdmin')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('pegawaiIndex');
        Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('/user/store', [UserController::class, 'store'])->name('userStore');

        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::post('/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::post('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');

        Route::get('/user/excel', [UserController::class, 'excel'])->name('userExcel');
        Route::get('/user/pdf', [UserController::class, 'pdf'])->name('userPdf');

        Route::get('/bidang', [BidangController::class, 'index'])->name('bidangIndex');
        Route::get('/bidang/create', [BidangController::class, 'create'])->name('bidangCreate');
        Route::post('/bidang/store', [BidangController::class, 'store'])->name('bidangStore');
        Route::get('/bidang/edit/{id}', [BidangController::class, 'edit'])->name('bidangEdit');
        Route::post('/bidang/update/{id}', [BidangController::class, 'update'])->name('bidangUpdate');
        Route::delete('/bidang/delete/{id}', [BidangController::class, 'destroy'])->name('bidangDelete');
        Route::get('/bidang/excel', [BidangController::class, 'excel'])->name('bidangExcel');
        Route::get('/bidang/pdf', [BidangController::class, 'pdf'])->name('bidangPdf');

        Route::get('/kantor', [KantorController::class, 'index'])->name('kantorIndex');
        Route::get('/kantor/create', [KantorController::class, 'create'])->name('kantorCreate');
        Route::post('/kantor/store', [KantorController::class, 'store'])->name('kantorStore');
        Route::get('/kantor/edit/{id}', [KantorController::class, 'edit'])->name('kantorEdit');
        Route::post('/kantor/update/{id}', [KantorController::class, 'update'])->name('kantorUpdate');
        Route::delete('/kantor/delete/{id}', [KantorController::class, 'destroy'])->name('kantorDelete');
        Route::get('/kantor/excel', [KantorController::class, 'excel'])->name('kantorExcel');
        Route::get('/kantor/pdf', [KantorController::class, 'pdf'])->name('kantorPdf');

        Route::get('/tipe', [TipeController::class, 'index'])->name('tipe');
        Route::get('/tipe/create', [TipeController::class, 'create'])->name('tipeCreate');
        Route::post('/tipe/store', [TipeController::class, 'store'])->name('tipeStore');
        Route::post('/tipe/destroy/{id}', [TipeController::class, 'destroy'])->name('tipeDestroy');
        Route::get('/tipe/edit/{id}', [TipeController::class, 'edit'])->name('tipeEdit');
        Route::post('/tipe/update/{id}', [TipeController::class, 'update'])->name('tipeUpdate');

        Route::get('/merk', [MerkController::class, 'index'])->name('merk');
        Route::get('/merk/create', [MerkController::class, 'create'])->name('merkCreate');
        Route::post('/merk/store', [MerkController::class, 'store'])->name('merkStore');
        Route::post('/merk/destroy/{id}', [MerkController::class, 'destroy'])->name('merkDestroy');
        Route::get('/merk/edit/{id}', [MerkController::class, 'edit'])->name('merkEdit');
        Route::post('/merk/update/{id}', [MerkController::class, 'update'])->name('merkUpdate');

        Route::get('/jenis', [JenisBController::class, 'index'])->name('jenis');
        Route::get('/jenis/create', [JenisBController::class, 'create'])->name('jenisCreate');
        Route::post('/jenis/store', [JenisBController::class, 'store'])->name('jenisStore');
        Route::post('/jenis/destroy/{id}', [JenisBController::class, 'destroy'])->name('jenisDestroy');
        Route::get('/jenis/edit/{id}', [JenisBController::class, 'edit'])->name('jenisEdit');
        Route::post('/jenis/update/{id}', [JenisBController::class, 'update'])->name('jenisUpdate');

        Route::get('/barang', [BarangController::class, 'index'])->name('barang');
        Route::get('/barang/create', [BarangController::class, 'create'])->name('barangCreate');
        Route::post('/barang/store', [BarangController::class, 'store'])->name('barangStore');
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barangEdit');
        Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barangUpdate');
        Route::post('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barangDestroy');
        Route::get('/barang/excel', [BarangController::class, 'excel'])->name('barangExcel');
        Route::get('/barang/pdf', [BarangController::class, 'pdf'])->name('barangPdf');
    });
});
