<?php

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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::controller('App\Http\Controllers\ShippingController')->group(function () {
    Route::get('/shipping', 'index')->name('shipping.index');
    Route::post('/shipping', 'costCalculation')->name('shipping.costCalculation');
});

Route::get('/users', 'App\Http\Controllers\User@index')->name('users');
