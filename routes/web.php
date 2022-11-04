<?php

use App\Http\Controllers\CostumerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::controller(LoginController::class)->name('login.')->prefix('login')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('register', 'register')->name('register-page');
    Route::post('auth', 'authenticate')->name('auth');
    Route::post('register', 'doRegister')->name('register');
    Route::post('logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
        Route::get('/', 'index');
    });

    // Product
    Route::controller(ProductController::class)->name('product.')->prefix('product')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::get('show/{id}', 'show')->name('show');
        Route::post('store', 'store')->name('store');
        Route::put('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('delete');
    });

    // Costumer
    Route::controller(CostumerController::class)->name('costumer.')->prefix('costumer')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('store', 'store')->name('store');
        Route::put('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('delete');
    });

    // Order
    Route::controller(OrderController::class)->name('order.')->prefix('order')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
    });
});
