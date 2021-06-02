<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create/client', 'App\Http\Controllers\ClientController@createClient');

Route::post('/create/customer', 'App\Http\Controllers\CustomerController@createCustomer');

Route::post('/create/item', 'App\Http\Controllers\ItemController@createItem');

Route::get('/users/key', 'App\Http\Controllers\UserController@makeAccessKey');