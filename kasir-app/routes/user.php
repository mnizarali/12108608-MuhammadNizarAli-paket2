<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->group( function() {
    Route::get('/', 'index');
    Route::post('/auth', 'auth')->name('auth');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');