<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController as LeadController;
use App\Http\Controllers\Api\WorkController as WorkController;
use App\Http\Controllers\Api\ServiceController as ServiceController;
use App\Http\Controllers\Api\TypeController as TypeController;

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


Route::post('/contacts', [LeadController::class, 'store']);
Route::get('/works', [WorkController::class, 'index']);
Route::get('/works/{slug}', [WorkController::class, 'show']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{slug}', [ServiceController::class, 'show']);
Route::get('/types', [TypeController::class, 'index']);