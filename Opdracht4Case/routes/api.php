<?php

use App\Http\Controllers\Api\CallCenterController;
use App\Http\Controllers\Api\TaxiCompanyController;
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

Route::apiResource('callcenter', CallCenterController::class);
Route::apiResource('taxi', TaxiCompanyController::class);
