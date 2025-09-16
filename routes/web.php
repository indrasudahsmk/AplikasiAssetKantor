<?php

use App\Models\Asset;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\JenisBController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetBidangController;
use App\Http\Controllers\MutasiAssetController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('isLogin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProses'])->name('registerProses');
});

Route::middleware('checkLogin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/assetpegawai', [AsetController::class, 'index'])->name('assetPegawaiIndex');
    Route::get('/assetsaya', [AsetController::class, 'indexpegawai'])->name('assetsayaIndex');

    Route::get('/assetBidang', [AssetBidangController::class, 'index'])->name('assetBidangIndex');
    Route::get('/assetBidang/create', [AssetBidangController::class, 'create'])->name('assetBidangCreate');
    Route::post('/assetBidang/store', [AssetBidangController::class, 'store'])->name('assetBidangStore');
    Route::get('/assetBidang/edit/{id}', [AssetBidangController::class, 'edit'])->name('assetBidangEdit');
    Route::put('/assetBidang/update/{id}', [AssetBidangController::class, 'update'])->name('assetBidangUpdate');
    Route::delete('/assetBidang/delete/{id}', [AssetBidangController::class, 'destroy'])->name('assetBidangDelete');
    Route::get('/assetBidang/excel', [AssetBidangController::class, 'excel'])->name('assetBidangExcel');
    Route::get('/assetBidang/pdf', [AssetBidangController::class, 'pdf'])->name('assetBidangPdf');

    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');

    Route::middleware('isAdmin')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('pegawaiIndex');
        Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('/user/store', [UserController::class, 'store'])->name('userStore');

        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::put('/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::post('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');

        Route::get('/user/excel', [UserController::class, 'excel'])->name('userExcel');
        Route::get('/user/pdf', [UserController::class, 'pdf'])->name('userPdf');

        Route::get('/bidang', [BidangController::class, 'index'])->name('bidangIndex');
        Route::get('/bidang/create', [BidangController::class, 'create'])->name('bidangCreate');
        Route::post('/bidang/store', [BidangController::class, 'store'])->name('bidangStore');
        Route::get('/bidang/edit/{id}', [BidangController::class, 'edit'])->name('bidangEdit');
        Route::put('/bidang/update/{id}', [BidangController::class, 'update'])->name('bidangUpdate');
        Route::delete('/bidang/delete/{id}', [BidangController::class, 'destroy'])->name('bidangDelete');
        Route::get('/bidang/excel', [BidangController::class, 'excel'])->name('bidangExcel');
        Route::get('/bidang/pdf', [BidangController::class, 'pdf'])->name('bidangPdf');

        Route::get('/kantor', [KantorController::class, 'index'])->name('kantorIndex');
        Route::get('/kantor/create', [KantorController::class, 'create'])->name('kantorCreate');
        Route::post('/kantor/store', [KantorController::class, 'store'])->name('kantorStore');
        Route::get('/kantor/edit/{id}', [KantorController::class, 'edit'])->name('kantorEdit');
        Route::put('/kantor/update/{id}', [KantorController::class, 'update'])->name('kantorUpdate');
        Route::delete('/kantor/delete/{id}', [KantorController::class, 'destroy'])->name('kantorDelete');
        Route::get('/kantor/excel', [KantorController::class, 'excel'])->name('kantorExcel');
        Route::get('/kantor/pdf', [KantorController::class, 'pdf'])->name('kantorPdf');

        Route::get('/tipe', [TipeController::class, 'index'])->name('tipe');
        Route::get('/tipe/create', [TipeController::class, 'create'])->name('tipeCreate');
        Route::post('/tipe/store', [TipeController::class, 'store'])->name('tipeStore');
        Route::delete('/tipe/destroy/{id}', [TipeController::class, 'destroy'])->name('tipeDestroy');
        Route::get('/tipe/edit/{id}', [TipeController::class, 'edit'])->name('tipeEdit');
        Route::put('/tipe/update/{id}', [TipeController::class, 'update'])->name('tipeUpdate');

        Route::get('/merk', [MerkController::class, 'index'])->name('merk');
        Route::get('/merk/create', [MerkController::class, 'create'])->name('merkCreate');
        Route::post('/merk/store', [MerkController::class, 'store'])->name('merkStore');
        Route::delete('/merk/destroy/{id}', [MerkController::class, 'destroy'])->name('merkDestroy');
        Route::get('/merk/edit/{id}', [MerkController::class, 'edit'])->name('merkEdit');
        Route::put('/merk/update/{id}', [MerkController::class, 'update'])->name('merkUpdate');

        Route::get('/jenis', [JenisBController::class, 'index'])->name('jenis');
        Route::get('/jenis/create', [JenisBController::class, 'create'])->name('jenisCreate');
        Route::post('/jenis/store', [JenisBController::class, 'store'])->name('jenisStore');
        Route::delete('/jenis/destroy/{id}', [JenisBController::class, 'destroy'])->name('jenisDestroy');
        Route::get('/jenis/edit/{id}', [JenisBController::class, 'edit'])->name('jenisEdit');
        Route::put('/jenis/update/{id}', [JenisBController::class, 'update'])->name('jenisUpdate');

        Route::get('/barang', [BarangController::class, 'index'])->name('barang');
        Route::get('/barang/create', [BarangController::class, 'create'])->name('barangCreate');
        Route::post('/barang/store', [BarangController::class, 'store'])->name('barangStore');
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barangEdit');
        Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barangUpdate');
        Route::delete('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barangDestroy');
        Route::get('/barang/excel', [BarangController::class, 'excel'])->name('barangExcel');
        Route::get('/barang/pdf', [BarangController::class, 'pdf'])->name('barangPdf');

        Route::get('/assetpegawai', [AsetController::class, 'index'])->name('assetPegawaiIndex');
        Route::get('/assetpegawai/create', [AsetController::class, 'create'])->name('assetPegawaiCreate');
        Route::post('/assetpegawai/store', [AsetController::class, 'store'])->name('assetPegawaiStore');
        Route::get('/assetpegawai/edit/{id}', [AsetController::class, 'edit'])->name('assetPegawaiEdit');
        Route::put('/assetpegawai/update/{id}', [AsetController::class, 'update'])->name('assetPegawaiUpdate');
        Route::delete('/assetpegawai/delete/{id}', [AsetController::class, 'destroy'])->name('assetPegawaiDestroy');
        Route::get('/assetpegawai/excel', [AsetController::class, 'excel'])->name('assetPegawaiExcel');
        Route::get('/assetpegawai/pdf', [AsetController::class, 'pdf'])->name('assetPegawaiPdf');

        Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');
        Route::get('/jabatan/create', [JabatanController::class, 'create'])->name('jabatanCreate');
        Route::post('/jabatan/store', [JabatanController::class, 'store'])->name('jabatanStore');
        Route::get('/jabatan/edit/{id_jabatan}', [JabatanController::class, 'edit'])->name('jabatanEdit');
        Route::put('/jabatan/update/{id_jabatan}', [JabatanController::class, 'update'])->name('jabatanUpdate');
        Route::delete('/jabatan/destroy/{id_jabatan}', [JabatanController::class, 'destroy'])->name('jabatanDestroy');

        Route::get('/mutasi', [MutasiAssetController::class, 'index'])->name('mutasiIndex');
        Route::get('/mutasi/create', [MutasiAssetController::class, 'create'])->name('mutasiCreate');
        Route::post('/mutasi/store', [MutasiAssetController::class, 'store'])->name('mutasiStore');
        Route::get('/mutasi/edit/{id_mutasi}', [MutasiAssetController::class, 'edit'])->name('mutasiEdit');
        Route::put('/mutasi/update/{id_mutasi}', [MutasiAssetController::class, 'update'])->name('mutasiUpdate');
        Route::delete('/mutasi/destroy/{id_mutasi}', [MutasiAssetController::class, 'destroy'])->name('mutasiDestroy');
    });
});
