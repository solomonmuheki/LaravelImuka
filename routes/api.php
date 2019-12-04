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
Route::get('deals', 'ApiController@getAllDeals');
Route::get('deals/{id}', 'ApiController@getDeal');
Route::post('deals', 'ApiController@createDeal');
Route::put('deal/update/{id}', 'ApiController@updateDeal');
Route::delete('deals/delete/{id}','ApiController@deleteDeal');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
