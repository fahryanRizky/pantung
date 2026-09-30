<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukTokoController;
use App\Http\Controllers\TokoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//master produk
Route::get('/produk', [ProdukController::class,'index']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::put('/produk/{id}', [ProdukController::class, 'update']);
Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);
Route::get('/produk-aktif', [ProdukController::class, 'aktif']);
Route::get('/produk/filter', [ProdukController::class, 'filter']);
Route::get('/produk/{id}/toko', [ProdukController::class, 'toko']);

//toko
Route::get('/toko', [TokoController::class, 'index']);
Route::get('/toko/{id}', [TokoController::class, 'show']);
Route::get('/toko/{id}/produk-toko', [TokoController::class, 'isiToko']);
Route::post('/toko', [TokoController::class, 'store']);
Route::delete('/toko/{id}', [TokoController::class, 'destroy']);
route::put('/toko/{id}', [TokoController::class, 'update']);

//produk toko
Route::get('/produk-toko', [ProdukTokoController::class, 'index']);
Route::get('/produk-toko/{id}', [ProdukTokoController::class, 'show']);
Route::post('/toko/{tokoId}/produk-toko/{produkId}', [ProdukTokoController::class, 'store']);
Route::