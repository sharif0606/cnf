<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FingerPrintController as fingerPrint;

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

Route::get('/msn', [fingerPrint::class,'msn']);
Route::post('/store_print', [fingerPrint::class,'storePrint']);
Route::get('/check_print/{msno}', [fingerPrint::class,'checkPrint']);