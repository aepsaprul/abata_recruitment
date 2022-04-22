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
});
