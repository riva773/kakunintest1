<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [ContactController::class, 'create']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.index');
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
