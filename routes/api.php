<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ContractController;
use App\Http\Controllers\Api\FlatController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PaymentMethodController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\PropertyDocumentController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserDocumentController;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);




Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class , 'logout']);


    // properties
    Route::get('/properties', [PropertyController::class, 'index']);
    Route::get('/property/show/{id}', [PropertyController::class, 'show']);
    Route::post('/property/store', [PropertyController::class, 'store']);
    Route::post('/property/update/{id}', [PropertyController::class, 'update']);
    Route::delete('/property/delete/{id}', [PropertyController::class, 'destroy']);


    // property documents
    Route::get('/property_documents', [PropertyDocumentController::class, 'index']);
    Route::get('/property_document/show/{id}', [PropertyDocumentController::class, 'show']);
    Route::post('/property_document/store', [PropertyDocumentController::class, 'store']);
    Route::post('/property_document/update/{id}', [PropertyDocumentController::class, 'update']);
    Route::delete('/property_document/delete/{id}', [PropertyDocumentController::class, 'destroy']);


    // flats
    Route::get('/flats', [FlatController::class, 'index']);
    Route::get('/flat/show/{id}', [FlatController::class, 'show']);
    Route::post('/flat/store', [FlatController::class, 'store']);
    Route::post('/flat/update/{id}', [FlatController::class, 'update']);
    Route::delete('/flat/delete/{id}', [FlatController::class, 'destroy']);


    // users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/show/{id}', [UserController::class, 'show']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

    Route::get('/user_contracts', [UserController::class, 'user_contracts']);
    Route::get('/user_requests', [UserController::class, 'user_requests']);
    Route::get('/user_documents', [UserController::class, 'user_documents']);


    // user documents
    Route::get('/user_documents', [UserDocumentController::class, 'index']);
    Route::get('/user_document/show/{id}', [UserDocumentController::class, 'show']);
    Route::post('/user_document/store', [UserDocumentController::class, 'store']);
    Route::post('/user_document/update/{id}', [UserDocumentController::class, 'update']);
    Route::delete('/user_document/delete/{id}', [UserDocumentController::class, 'destroy']);




    // invoices
    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/invoice/show/{id}', [InvoiceController::class, 'show']);
    Route::post('/invoice/store', [InvoiceController::class, 'store']);
    Route::post('/invoice/update/{id}', [InvoiceController::class, 'update']);
    Route::delete('/invoice/delete/{id}', [InvoiceController::class, 'destroy']);


    // notifications
    Route::post('/notification/store', [NotificationController::class, 'store']);


    // companies
    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/company/show/{id}', [CompanyController::class, 'show']);
    Route::post('/company/store', [CompanyController::class, 'store']);
    Route::post('/company/update/{id}', [CompanyController::class, 'update']);
    Route::delete('/company/delete/{id}', [CompanyController::class, 'destroy']);



    // contracts
    Route::get('/contracts', [ContractController::class, 'index']);
    Route::get('/contract/show/{id}', [ContractController::class, 'show']);
    Route::post('/contract/store', [ContractController::class, 'store']);
    Route::post('/contract/update/{id}', [ContractController::class, 'update']);
    Route::delete('/contract/delete/{id}', [ContractController::class, 'destroy']);




    // requests
    Route::get('/requests', [RequestController::class, 'index']);
    Route::get('/request/show/{id}', [RequestController::class, 'show']);
    Route::post('/request/store', [RequestController::class, 'store']);
    Route::post('/request/update/{id}', [RequestController::class, 'update']);
    Route::delete('/request/delete/{id}', [RequestController::class, 'destroy']);




    // services
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/service/show/{id}', [ServiceController::class, 'show']);
    Route::post('/service/store', [ServiceController::class, 'store']);
    Route::post('/service/update/{id}', [ServiceController::class, 'update']);
    Route::delete('/service/delete/{id}', [ServiceController::class, 'destroy']);


    // payment_methods
    Route::get('/payment_methods', [PaymentMethodController::class, 'index']);
    Route::get('/payment_method/show/{id}', [PaymentMethodController::class, 'show']);
    Route::post('/payment_method/store', [PaymentMethodController::class, 'store']);
    Route::post('/payment_method/update/{id}', [PaymentMethodController::class, 'update']);
    Route::delete('/payment_method/delete/{id}', [PaymentMethodController::class, 'destroy']);

});






















