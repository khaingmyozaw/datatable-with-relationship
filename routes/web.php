<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'showPosts'])->name('users.showPosts');