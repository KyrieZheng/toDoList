<?php

use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});

Route::post('/api/item/store', \App\Http\Controllers\ItemController::class . '@addItem');
Route::get('/api/item', \App\Http\Controllers\ItemController::class. '@getItem');
Route::get('/api/delete.item/{id}', \App\Http\Controllers\ItemController::class. '@deleteItem');
Route::get('/api/update.item', \App\Http\Controllers\ItemController::class. '@updateItem');
