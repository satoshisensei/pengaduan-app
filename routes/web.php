<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BalasanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\{Auth,Route};
use App\Http\Controllers\MasyarakatController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing-page');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Data Dasar
    Route::get('/datapegawai',[PegawaiController::class, 'data'])->name('pegawai-data');
    Route::get('/datamasyarakat',[MasyarakatController::class, 'data'])->name('masyarakat-data');

    Route::resource('/pegawai', PegawaiController::class)->except('show');
    Route::resource('/masyarakat', MasyarakatController::class)->except('show');

    // Main Data
    Route::get('/databalasan',[BalasanController::class, 'data'])->name('balasan-data');
    Route::get('/databalasam',[BalasanController::class, 'data'])->name('balasan-data');

    Route::resource('/laporan', LaporanController::class)->except('show');
    Route::resource('/balasan', BalasanController::class);

});
