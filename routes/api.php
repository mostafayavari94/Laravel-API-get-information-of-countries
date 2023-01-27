<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('get_otp_token', [AuthController::class, 'getOTPToken'])->name("get.token");
Route::post('get_auth_token', [AuthController::class, 'getAuthToken'])->name("validate.token");

Route::prefix('country')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/list', [CountryController::class, 'getCountreis'])->name('country.list');
});
