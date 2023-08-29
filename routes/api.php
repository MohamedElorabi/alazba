<?php

use App\Http\Controllers\Api\FlatController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\UserController;
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




// properties
Route::get('/properties', [PropertyController::class, 'index']);
Route::post('/property/show/{id}', [PropertyController::class, 'show']);
Route::post('/property/store', [PropertyController::class, 'store']);
Route::post('/property/update/{id}', [PropertyController::class, 'update']);
Route::delete('/property/delete/{id}', [PropertyController::class, 'destroy']);




// flats
Route::get('/flats', [FlatController::class, 'index']);
Route::post('/flat/show/{id}', [FlatController::class, 'show']);
Route::post('/flat/store', [FlatController::class, 'store']);
Route::post('/flat/update/{id}', [FlatController::class, 'update']);
Route::delete('/flat/delete/{id}', [FlatController::class, 'destroy']);



// users
Route::get('/users', [UserController::class, 'index']);
Route::post('/user/show/{id}', [UserController::class, 'show']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);
