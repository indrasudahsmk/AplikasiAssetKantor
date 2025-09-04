<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('isLogin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');
});

Route::middleware('checkLogin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('karyawan/tugas/pdf', [TugasController::class, 'Karyawanpdf'])->name('tugasKaryawanPdf');

    Route::middleware('isAdmin')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('pegawai.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('/user/store', [UserController::class, 'store'])->name('userStore');

        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::put('/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::post('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');

        Route::get('/user/excel', [UserController::class, 'excel'])->name('userExcel');
        Route::get('/user/pdf', [UserController::class, 'pdf'])->name('userPdf');

        Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugasCreate');
        Route::post('/tugas/store', [TugasController::class, 'store'])->name('tugasStore');
        Route::get('/tugas/edit/{id}', [TugasController::class, 'edit'])->name('tugasEdit');
        Route::post('/tugas/update/{id}', [TugasController::class, 'update'])->name('tugasUpdate');
        Route::post('/tugas/destroy/{id}', [TugasController::class, 'destroy'])->name('tugasDestroy');
        Route::get('/tugas/excel', [TugasController::class, 'excel'])->name('tugasExcel');
        Route::get('/tugas/pdf', [TugasController::class, 'pdf'])->name('tugasPdf');
    });
});
