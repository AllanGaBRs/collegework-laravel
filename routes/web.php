<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;

Route::resource('suppliers', SupplierController::class);
Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('main');
});

Route::view('/students', 'students')->name('students');
Route::view('/', 'main')->name('main');