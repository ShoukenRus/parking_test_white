<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientController,
    App\Http\Controllers\Car\CarController,
    App\Http\Controllers\Main\MainController;

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
Route::get('/', [MainController::class, 'index'])->name('main');
Route::resource('clients', ClientController::class)->names('client')->except('show', 'destroy');
Route::resource('car', CarController::class)->names('car')->except('index', 'create', 'show', 'edit');
