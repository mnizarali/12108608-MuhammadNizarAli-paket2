<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardControllerController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function() {
    // user route
    route::get('/dashboard/user', 'viewUser')->name('dashboard.user');
    route::get('/dashboard/user/register', 'Register')->name('dashboard.user.register');
    route::post('/dashboard/user/create', 'createUser')->name('dashboard.user.create');
    route::post('/dashboard/user/delete/{id}', 'deleteUser')->name('dashboard.user.delete');
    route::post('/dashboard/user/update/{id}', 'updateUser')->name('dashboard.user.update');
    // product route
    route::get('/dashboard/product', 'viewProduct')->name('dashboard.product');
    route::post('/dashboard/product/create', 'createProduct')->name('dashboard.product.create');

});