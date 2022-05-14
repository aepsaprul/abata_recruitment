<?php

use App\Http\Controllers\LokerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    // profile
        // biodata
        Route::post('profile/biodata', [ProfileController::class, 'biodata'])->name('profile.biodata');
        Route::post('profile/biodatas/update', [ProfileController::class, 'biodataUpdate'])->name('profile.biodata_update');
        Route::post('profile/foto/update', [ProfileController::class, 'fotoUpdate'])->name('profile.foto_update');
        Route::post('profile/kk/update', [ProfileController::class, 'kkUpdate'])->name('profile.kk_update');
        Route::post('profile/ktp/update', [ProfileController::class, 'ktpUpdate'])->name('profile.ktp_update');
        Route::post('profile/surat_lamaran/update', [ProfileController::class, 'suratLamaranUpdate'])->name('profile.surat_lamaran_update');
        Route::post('profile/cv/update', [ProfileController::class, 'cvUpdate'])->name('profile.cv_update');
        Route::post('profile/ijazah/update', [ProfileController::class, 'ijazahUpdate'])->name('profile.ijazah_update');

        // keluarga sebelum menikah
        Route::get('profile/{id}/sebelum_menikah', [ProfileController::class, 'sebelumMenikah'])->name('profile.sebelum_menikah');
        Route::post('profile/sebelum_menikah/store', [ProfileController::class, 'sebelumMenikahStore'])->name('profile.sebelum_menikah_store');
        Route::get('profile/{id}/sebelum_menikah_delete', [ProfileController::class, 'sebelumMenikahDelete'])->name('profile.sebelum_menikah_delete');

        // keluarga setelah menikah
        Route::get('profile/{id}/setelah_menikah', [ProfileController::class, 'setelahMenikah'])->name('profile.setelah_menikah');
        Route::post('profile/setelah_menikah/store', [ProfileController::class, 'setelahMenikahStore'])->name('profile.setelah_menikah_store');
        Route::get('profile/{id}/setelah_menikah_delete', [ProfileController::class, 'setelahMenikahDelete'])->name('profile.setelah_menikah_delete');

        // kerabata darurat
        Route::get('profile/{id}/kerabat_darurat', [ProfileController::class, 'kerabatDarurat'])->name('profile.kerabat_darurat');
        Route::post('profile/kerabat_darurat/store', [ProfileController::class, 'kerabatDaruratStore'])->name('profile.kerabat_darurat_store');
        Route::get('profile/{id}/kerabat_darurat_delete', [ProfileController::class, 'kerabatDaruratDelete'])->name('profile.kerabat_darurat_delete');

        // medsos
        Route::get('profile/{id}/medsos', [ProfileController::class, 'medsos'])->name('profile.medsos');
        Route::post('profile/medsos/store', [ProfileController::class, 'medsosStore'])->name('profile.medsos_store');
        Route::get('profile/{id}/medsos_delete', [ProfileController::class, 'medsosDelete'])->name('profile.medsos_delete');

        // pendidikan
        Route::get('profile/{id}/pendidikan', [ProfileController::class, 'pendidikan'])->name('profile.pendidikan');
        Route::post('profile/pendidikan/store', [ProfileController::class, 'pendidikanStore'])->name('profile.pendidikan_store');
        Route::get('profile/{id}/pendidikan_delete', [ProfileController::class, 'pendidikanDelete'])->name('profile.pendidikan_delete');

        // penghargaan
        Route::get('profile/{id}/penghargaan', [ProfileController::class, 'penghargaan'])->name('profile.penghargaan');
        Route::post('profile/penghargaan/store', [ProfileController::class, 'penghargaanStore'])->name('profile.penghargaan_store');
        Route::get('profile/{id}/penghargaan_delete', [ProfileController::class, 'penghargaanDelete'])->name('profile.penghargaan_delete');

        // organisasi
        Route::get('profile/{id}/organisasi', [ProfileController::class, 'organisasi'])->name('profile.organisasi');
        Route::post('profile/organisasi/store', [ProfileController::class, 'organisasiStore'])->name('profile.organisasi_store');
        Route::get('profile/{id}/organisasi_delete', [ProfileController::class, 'organisasiDelete'])->name('profile.organisasi_delete');

        // riwayat pekerjaan
        Route::get('profile/{id}/riwayat_pekerjaan', [ProfileController::class, 'riwayatPekerjaan'])->name('profile.riwayat_pekerjaan');
        Route::post('profile/riwayat_pekerjaan/store', [ProfileController::class, 'riwayatPekerjaanStore'])->name('profile.riwayat_pekerjaan_store');
        Route::get('profile/{id}/riwayat_pekerjaan_delete', [ProfileController::class, 'riwayatPekerjaanDelete'])->name('profile.riwayat_pekerjaan_delete');

    // loker
    Route::get('loker', [LokerController::class, 'index'])->name('loker.index');
    Route::post('loker/store', [LokerController::class, 'store'])->name('loker.store');
});
