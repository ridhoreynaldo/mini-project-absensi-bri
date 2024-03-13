<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;//tambahan
use App\Http\Controllers\RedirectController;//tambahan
use App\Http\Controllers\AdminController;//tambahan
use App\Http\Controllers\PjController;//tambahan
use App\Http\Controllers\AsistenController;//tambahan

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
//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk admin, pj dan asisten
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/data-asisten', [AdminController::class, 'indexAsisten']);
    Route::delete('/data-asisten/{id}', [AdminController::class, 'destroy'])->name('data-asisten.destroy');

    // Route::resource('/data-asisten', AdminController::class);
});

// untuk pj
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    // Route::get('/pj', [PjController::class, 'index']);
});

// untuk asisten
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    // Route::get('/asisten', [AsistenController::class, 'index']);
});

Route::post('/generate', [AdminController::class, 'index2'])->name('admin.index');//ini generate kode

Route::post('/data-asisten', [App\Http\Controllers\AdminController::class, 'storeAsisten'])->name('asistenSave');//tambahan