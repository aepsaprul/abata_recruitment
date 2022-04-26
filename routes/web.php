<?php

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
    // biodata
    Route::post('profile/biodata', [ProfileController::class, 'biodata'])->name('profile.biodata');
    Route::post('profile/biodatas/update', [ProfileController::class, 'biodataUpdate'])->name('profile.biodata_update');
    Route::post('profile/foto/update', [ProfileController::class, 'fotoUpdate'])->name('profile.foto_update');

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
});
