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

Route::group([
    'prefix' => 'public'
], function ($router) {
    Route::apiResources([
        'users' => \App\Http\Controllers\UserController::class,
        'contracts' => \App\Http\Controllers\ContractController::class,
        'rates' => \App\Http\Controllers\RateController::class,
    ]);

    Route::post('test', [App\Http\Controllers\VehicleController::class , 'import']);
    Route::post('rate', [App\Http\Controllers\ContractController::class , 'store']);
});
