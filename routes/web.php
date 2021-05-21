<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\VerifikasiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [DashboardController::class, 'index'])->name('index');
Route::post('/upload-file', [DashboardController::class, 'uploadFile'])->name('upload-file');

Route::get('/daftar-dokumen', [DokumenController::class, 'index'])->name('daftar-dokumen');
Route::delete('/daftar-dokumen/{uploads}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
Route::get('/daftar-dokumen/preview/{uploads}', [DokumenController::class, 'preview'])->name('dokumen.preview');
Route::get('/daftar-dokumen/search', [DokumenController::class, 'search'])->name('dokumen.search');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::patch('/profile/reset-password', [ProfileController::class, 'resetPassword'])->name('reset-password');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/agenda/tambah', [AgendaController::class, 'create'])->name('agenda.create');
Route::post('/agenda/tambah', [AgendaController::class, 'store'])->name('agenda.store');
Route::get('/agenda/edit/{agenda}', [AgendaController::class, 'edit'])->name('agenda.edit');
Route::patch('/agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
Route::delete('/agenda/{agenda}', [AgendaController::class, 'destroy'])->name('agenda.destroy');
Route::get('/agenda/nominatif/{agenda}', [AgendaController::class, 'nominatif'])->name('agenda.nominatif');
Route::get('/agenda/nominatif/{agenda}/search', [AgendaController::class, 'search'])->name('agenda.nominatif.search');
Route::post('/agenda/nominatif/{agenda}', [AgendaController::class, 'nominatifStore'])->name('agenda.nominatif.store');
Route::delete('/agenda/nominatif/{nominatif}', [AgendaController::class, 'nominatifDestroy'])->name('agenda.nominatif.destroy');
Route::post('/agenda/nominatif/{agenda}/usulan', [AgendaController::class, 'usulanStore'])->name('agenda.nominatif.usulan.store');

Route::get('/berkas-usulan', [UsulanController::class, 'index'])->name('usulan.index');
Route::get('/berkas-usul', [UsulanController::class, 'search'])->name('usulan.search');
Route::get('/berkas/{usulan}', [VerifikasiController::class, 'show'])->name('verifikasi.show'); //delete soon

Route::middleware(['ceklogin:admin'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/tambah', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai/tambah', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::patch('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    Route::get('/operator', [OperatorController::class, 'index'])->name('operator.index');
    Route::get('/operator/tambah', [OperatorController::class, 'create'])->name('operator.create');
    Route::post('/operator/tambah', [OperatorController::class, 'store'])->name('operator.store');
    Route::patch('/operator/{user}/reset', [OperatorController::class, 'reset'])->name('operator.reset');
    Route::delete('/operator/{user}', [OperatorController::class, 'destroy'])->name('operator.destroy');

    Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('verifikasi.index');
    Route::patch('/verifikasi/agree/{usulan}', [VerifikasiController::class, 'verifikasi'])->name('verifikasi.setuju');
    Route::patch('/verifikasi/decline/{usulan}', [VerifikasiController::class, 'tolak'])->name('verifikasi.tolak');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
