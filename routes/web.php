<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
//route untuk produk
Route::get('/produk/search', [ProdukController::class, 'search'])->name('produk.search');

Route::get('/produk/add', [ProductController::class, 'create'])->name('produk.add');

Route::post('/produk/store', [ProductController::class, 'store'])->name('produk.store');

Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');

Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('produk.edit');

Route::put('/produk/{id}', [ProductController::class, 'update'])->name('produk.update');

Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');
//
//route untuk dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
