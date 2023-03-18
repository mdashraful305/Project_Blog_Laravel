<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RoleController;
Route::get('/', [HomeController::class,'index'])->name('home');


Route::get('/login', [AccessController::class,'logform'])->name('login');
Route::post('/login', [AccessController::class,'login']);
Route::get('/signup', [AccessController::class,'signform'])->name('signup');
Route::post('/signup', [AccessController::class,'register']);
Route::get('/logout', [AccessController::class,'logout'])->name('logout');


Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::get('/', [AdminController::class,'home'])->name('dashboard');
        Route::get('/profile', [AdminController::class,'profile'])->name('profile');
        //Post
        Route::get('/post', [PostController::class,'index'])->name('show_post');
        Route::get('/post/add', [PostController::class,'show'])->name('add_post');
        Route::post('/post/add', [PostController::class,'create']);
        Route::get('/post/edit/{id}', [PostController::class,'edit'])->name('edit_post');
        Route::post('/post/edit/{id}', [PostController::class,'update']);
        Route::get('/post/delete/{id}', [PostController::class,'destroy'])->name('del_post');

        //Category
        Route::get('/category', [CategoryController::class,'index'])->name('show_cat');
        Route::get('/category/add', [CategoryController::class,'show'])->name('add_cat');
        Route::post('/category/add', [CategoryController::class,'create']);
        Route::get('/category/edit/{id}', [CategoryController::class,'edit'])->name('edit_cat');
        Route::post('/category/edit/{id}', [CategoryController::class,'update']);
        Route::get('/category/delete/{id}', [CategoryController::class,'destroy'])->name('del_cat');

        Route::resource('tag', TagController::class);

        Route::resource('role', RoleController::class);

        Route::resource('user', AdminController::class);

    });
});




