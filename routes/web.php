<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AnalystController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/{kode}', [MatakuliahController::class, 'show']);

Route::view('/admin', 'admin.dashboard')->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('analyst', AnalystController::class);
});
