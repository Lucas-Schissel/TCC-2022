<?php

use App\Http\Controllers\Api\ApiEventoController;
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

Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});

Route::get('inputs/{id}', 'Api\ApiEventoController@inputs');
/*

Route::apiResource('eventos', ApiEventoController::entradas);

/*
Route::get('eventos', 'api\ApiEventoController@entradas');
Route::post('dados', 'api\ApiEventoController@eventos');
*/