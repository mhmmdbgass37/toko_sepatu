<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::controller(ProdukController::class)->prefix('produk')->group(function () {
    Route::get('', 'index')->name('produk');
    Route::get('tambah', 'create')->name('produk.from');
    Route::post('tambah', 'simpan')->name('produk.simpan');
    Route::get('edit/{id}', 'edit')->name('produk.edit');
    Route::put('edit/{id}', 'update')->name('produk.update');
    Route::get('hapus/{id}', 'delete')->name('produk.hapus');
});
