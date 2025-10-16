<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MatakuliahController;

use App\Http\Controllers\QuestionController;

use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\PegawaiController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa PCR! :)';
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'My name : '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'My NIM : '.$param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/mahasiswa/{param1?}', [MahasiswaController::class, 'show']);

Route::get('/home', function() {
    return view('home');
});

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
