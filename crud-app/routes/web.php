<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// --------Main_page-------------
Route::get('/', [ProductController::class, 'index']);
// --------Create Product----------------
Route::get('product/create', [ProductController::class, 'create']);
// ------------Store Route-------------------------
Route::post('Product/store', [ProductController::class, 'store']);
// ---------------------------------------------------
Route::get('Product/{id}/show', [ProductController::class, 'show']);
// -----------------------------------------------
Route::get('Product/{id}/edit', [ProductController::class, 'edit']);
// -------------------------------------------------------
Route::put('Product/{id}/update', [ProductController::class, 'update']);
// ---------------------------------
Route::get('Product/{id}/delete', [ProductController::class, 'delete']);