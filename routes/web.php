<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/posts/{id}', [FrontController::class, 'show'])->name('posts.show');
Route::get('/category/{id}', [FrontController::class, 'category'])->name('category.posts');
Route::get('/search', [FrontController::class, 'search'])->name('search');
    

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin_staff'])->group(function () {

        Route::get('/', [AdminController::class, 'admin'])->name('index');

        Route::resource('posts', PostController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);

    });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
