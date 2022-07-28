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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::resource('region',App\Http\Controllers\Settings\RegionController::class);
Route::resource('country',App\Http\Controllers\Settings\CountryController::class);
Route::resource('company',App\Http\Controllers\Settings\CompanyController::class);
