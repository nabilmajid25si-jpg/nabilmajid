<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AnalystController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PasokanController;

// Guest
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// Guest: Pasokan (data CRUD Pembelian [Eloquent] + Supplier [Query Builder])
Route::get('/pasokan', [PasokanController::class, 'index'])->name('pasokan.index');

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/{kode}', [MatakuliahController::class, 'show']);

Route::view('/admin', 'admin.dashboard')->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('analyst', AnalystController::class);
    Route::resource('user', UserController::class);
    Route::resource('supplier', SupplierController::class);  // CRUD 2 - Query Builder
    Route::resource('purchase', PurchaseController::class);  // CRUD 1 - Eloquent
});
