<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\TransactionController;
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
    return view('need.main');
});

Route::resource('/buyer', BuyerController::class);
Route::resource('/item', ItemController::class);
Route::resource('/payment', PaymentController::class);
Route::resource('/supply', SupplyController::class);
Route::resource('/dashboard' , DashboardController::class);
Route::resource('/transaction', TransactionController::class);