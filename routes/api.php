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


Route::middleware('auth:sanctum')->get('api/user', function (Request $request) {
    return $request->user();
});

Route::group( ['middleware'=> ["auth:sanctum"]], function() {
    Route::resource('region',App\Http\Controllers\Settings\RegionController::class);
    Route::resource('country',App\Http\Controllers\Settings\CountryController::class);
    Route::resource('state',App\Http\Controllers\Settings\StateController::class);
    Route::resource('city',App\Http\Controllers\Settings\CityController::class);
    Route::resource('company',App\Http\Controllers\Settings\CompanyController::class);
    Route::resource('menu',App\Http\Controllers\Settings\MenuController::class);
    Route::resource('role',App\Http\Controllers\Settings\MenuController::class);
    Route::resource('permit',App\Http\Controllers\Settings\MenuController::class);
    Route::resource('brand',App\Http\Controllers\Settings\MenuController::class);
    Route::resource('model',App\Http\Controllers\Settings\MenuController::class);
    Route::resource('unity',App\Http\Controllers\Settings\MenuController::class);
    Route::get('/getProjectUser', [App\Http\Controllers\SessionController::class,'getProjectUser']);
});


