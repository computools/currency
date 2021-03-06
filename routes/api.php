<?php

use Illuminate\Http\Request;

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

Route::middleware('api-auth')->get('/currencies', "Currency\CurrencyController@getList");
Route::middleware('api-auth')->get('/currency/{code}', "Currency\CurrencyController@getCurrencyRate");
Route::middleware('api-auth')->get('/currencies/history/{code}', "Currency\CurrencyController@getHistory");


