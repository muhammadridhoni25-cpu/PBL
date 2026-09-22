<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\DataAkademikController;

Route::get('/', fn () => redirect()->route('buku.index'));
Route::resource('buku', BukuController::class);

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio.index');
Route::get('/portofolio/create', [PortofolioController::class, 'create'])->name('portofolio.create');
Route::post('/portofolio', [PortofolioController::class, 'store'])->name('portofolio.store');
Route::get('/portofolio/{id}/edit', [PortofolioController::class, 'edit'])->name('portofolio.edit');
Route::put('/portofolio/{id}', [PortofolioController::class, 'update'])->name('portofolio.update');
Route::delete('/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy');
Route::get('/dashboard-lomba', function () {
    return view('portofolio.dashboard-lomba-mahasiswa');
});
Route::resource('data-akademik', DataAkademikController::class);