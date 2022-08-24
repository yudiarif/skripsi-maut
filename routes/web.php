<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenagaHonorerController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
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

Route::group(['middleware'=>['auth','admin']], function(){
    Route::resource('tenaga-honorer', TenagaHonorerController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('sub-kriteria', SubkriteriaController::class);
    Route::resource('user', UserController::class);

});

Route::group(['middleware'=>['auth','dm']],function(){
    Route::get('/perhitungan', [PerhitunganController::class, 'perhitungan'])->name('perhitungan');
    Route::get('/bobot', [PerhitunganController::class, 'create'])->name('bobot');
    Route::post('/bobot-store', [PerhitunganController::class, 'store'])->name('bobot-store');
    Route::resource('hasil', PerhitunganController::class);
});
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('profil', ProfilController::class)->middleware('auth');
//Route::resource('login', LoginController::class)->middleware('guest');
Route::post('/login-auth', [LoginController::class, 'authenticate'])->name('login-auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/hasil-perhitungan', [HasilController::class, 'perhitungan'])->name('hasil-perhitungan');
//Route::get('/akhir', [PerhitunganController::class, 'hasil'])->name('hasil');
