<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FormaturController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\Admin\AdminAuthController;

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
    return view('auth.login');
})->name('welcome');

Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Auth::routes();

// Admin
Route::middleware(['admin'])->group(function() {
    Route::resource('/admin', AdminController::class);

    Route::get('/admin/formatur/index', [FormaturController::class, 'index'])->name('formatur.index');
    Route::get('/admin/formatur/detail/{id}', [FormaturController::class, 'detail'])->name('formatur.detail');
    Route::post('/admin/formatur/tambah', [FormaturController::class, 'create'])->name('formatur.tambah');
    Route::post('/admin/formatur/hapus/{id}', [FormaturController::class, 'destroy'])->name('formatur.hapus');
    
    
    Route::get('/admin/pemilih/index', [PemilihController::class, 'index'])->name('pemilih.index');
    Route::get('/admin/pemilih/detail/{id}', [PemilihController::class, 'detail'])->name('pemilih.detail');
    Route::post('/admin/pemilih/tambah', [PemilihController::class, 'create'])->name('pemilih.tambah');
    Route::post('/admin/pemilih/hapus/{id}', [PemilihController::class, 'destroy'])->name('pemilih.hapus');
});

// Guest
Route::get('/guest', [GuestController::class, 'index'])->name('guest.index');

Route::post('/import', [AdminController::class, 'import'])->name('import');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






