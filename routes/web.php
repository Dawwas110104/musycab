<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/admin', AdminController::class);

// Route::get('/admin/formatur', [App\Http\Controllers\AdminController::class, 'coba'])->name('admin.formatur');

Route::get('/admin/coba', function () {
    return view('auth.login');
})->name('admin.formatur');
