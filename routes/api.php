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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['api']], function () {
    /*
     *towns routes
     */
    Route::post('towns', 'TownsController@create_town');
    Route::get('towns', 'TownsController@fetch_towns');
    /*
     *companies routes
     */
    Route::post('companies', 'BusCompanyController@create_bus_company');
    Route::get('companies', 'BusCompanyController@fetch_companies');

});
