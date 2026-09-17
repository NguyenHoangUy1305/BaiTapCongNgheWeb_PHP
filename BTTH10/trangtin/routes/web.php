<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChudeController;
use App\Http\Controllers\BantinController;
Route::get('/', function () {
    return view('welcome');
});

// Các Route quản lý chủ đề
Route::get('/chude', [ChudeController::class, 'index'])->name('chude.index');
Route::get('/chude/create', [ChudeController::class, 'create'])->name('chude.create');
Route::post('/chude', [ChudeController::class, 'store'])->name('chude.store');
Route::get('/chude/{id}/edit', [ChudeController::class, 'edit'])->name('chude.edit');
Route::put('/chude/{id}', [ChudeController::class, 'update'])->name('chude.update');
Route::delete('/chude/{id}', [ChudeController::class, 'destroy'])->name('chude.destroy');
Route::get('/', [BantinController::class, 'index'])->name('home');
Route::get('/chi-tiet/{id}', [BantinController::class, 'show'])->name('bantin.show');
Route::get('/bantin/create', [BantinController::class, 'create'])->name('bantin.create');
Route::post('/bantin', [BantinController::class, 'store'])->name('bantin.store');
Route::get('/bantin/{id}/edit', [BantinController::class, 'edit'])->name('bantin.edit');
Route::put('/bantin/{id}', [BantinController::class, 'update'])->name('bantin.update');
Route::delete('/bantin/{id}', [BantinController::class, 'destroy'])->name('bantin.destroy');