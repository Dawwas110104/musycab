<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

// koneksi DataTables
Route::get('/admin/formatur/index', [App\Http\Controllers\AdminController::class, 'formatur'])->name('admin.formatur');
Route::get('/admin/pemilih/index', [App\Http\Controllers\AdminController::class, 'pemilih'])->name('admin.pemilih');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/formatur/index', [App\Http\Controllers\AdminController::class, 'formatur'])->name('admin.formatur');
Route::get('/admin/pemilih/index', [App\Http\Controllers\AdminController::class, 'pemilih'])->name('admin.pemilih');

Route::middleware(['admin'])->group(function() {
    Route::resource('/admin', AdminController::class);
});


