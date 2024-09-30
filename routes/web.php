<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect()->route('users.index');
});
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'showPosts'])->name('users.showPosts');
Route::post('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');