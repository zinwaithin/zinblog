<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');