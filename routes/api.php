<?php

use App\Http\Controllers\Api\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::get('/properties', [PropertyController::class, 'index']);
Route::post('/property/show/{id}', [PropertyController::class, 'show']);
Route::post('/property/store', [PropertyController::class, 'store']);
Route::post('/property/update/{id}', [PropertyController::class, 'update']);
Route::delete('/property/delete/{id}', [PropertyController::class, 'destroy']);
