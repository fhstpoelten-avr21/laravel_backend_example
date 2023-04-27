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

Route::group(['prefix' => '/v1'], function () {

    //API documentation
    Route::view('documentation', 'api-docs');
    Route::get('documentation/api-docs.yml', '\App\Http\Controllers\ApiDocsController@yml');

    // Passengers
    Route::get('passengers/{airlineId?}','\App\Http\Controllers\PassengerController@index');

    // Airlines
    Route::resource('airlines', \App\Http\Controllers\AirlineController::class);
});
