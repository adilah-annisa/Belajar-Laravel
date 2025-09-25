<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MatakuliahController;

Route::get('/matakuliah/index', [MatakuliahController::class, 'index']);
Route::get('/matakuliah/create', [MatakuliahController::class, 'create']);
Route::get('/matakuliah/store', [MatakuliahController::class, 'store']);
Route::get('/matakuliah/show/{id}', [MatakuliahController::class, 'show']);
Route::get('/matakuliah/edit/{id}', [MatakuliahController::class, 'edit']);
Route::get('/matakuliah/update/{id}', [MatakuliahController::class, 'update']);
Route::get('/matakuliah/destroy/{id}', [MatakuliahController::class, 'destroy']);

use App\Http\Controllers\MahasiswaController;

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

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'My NIM : '.$param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/mahasiswa/{param1?}', [MahasiswaController::class, 'show']);

