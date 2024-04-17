<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardControllerController;
use Illuminate\Support\Facades\Route;


Route::middleware(['isGuest'])->group( function() {
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
        route::post('/dashboard/product/updateStock{id}', 'addStock')->name('dashboard.product.editstock');
        route::post('/dashboard/product/editStock{id}', 'updateStock')->name('dashboard.product.updatestock');
        // sales route
        route::get('/dashboard/sales', 'viewSale')->name('dashboard.sales');
        route::get('/dashboard/sales/invoice', 'pdfInvoice')->name('dashboard.sales.invoice');
        route::post('/dashboard/sales/confirmpayment', 'confirmPayment')->name('dashboard.sales.confirmpayment');
        route::get('/dashboard/sales/backtopembelian', 'backToPembelian')->name('dashboard.sales.back');
        route::get('/dashboard/sales/history', 'viewHistory')->name('dashboard.sales.history');
    });
});