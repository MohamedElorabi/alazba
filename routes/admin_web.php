<?php

use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\FlatController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyDocumentController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserDocumentController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
});

// propertis
Route::prefix('properties')->group(function () {
	Route::get('/', [PropertyController::class, 'index'])->name('properties');
    Route::get('/create', [PropertyController::class, 'create'])->name('create.property');
    Route::get('/show/{id}', [PropertyController::class, 'show'])->name('show.property');
    Route::post('/store', [PropertyController::class, 'store'])->name('store.property');
    Route::get('/edit/{id}', [PropertyController::class, 'edit'])->name('edit.property');
    Route::post('/update/{id}', [PropertyController::class, 'update'])->name('update.property');
    Route::delete('/delete/{id}', [PropertyController::class, 'destroy'])->name('delete.property');
});


// property documents
Route::prefix('property_documents')->group(function () {
	Route::get('/', [PropertyDocumentController::class, 'index'])->name('property_documents');
    Route::get('/create', [PropertyDocumentController::class, 'create'])->name('create.property_document');
    Route::get('/show/{id}', [PropertyDocumentController::class, 'show'])->name('show.property_document');
    Route::post('/store', [PropertyDocumentController::class, 'store'])->name('store.property_document');
    Route::get('/edit/{id}', [PropertyDocumentController::class, 'edit'])->name('edit.property_document');
    Route::post('/update/{id}', [PropertyDocumentController::class, 'update'])->name('update.property_document');
    Route::delete('/delete/{id}', [PropertyDocumentController::class, 'destroy'])->name('delete.property_document');
});



// flats
Route::prefix('flats')->group(function () {
	Route::get('/', [FlatController::class, 'index'])->name('flats');
    Route::get('/create', [FlatController::class, 'create'])->name('create.flat');
    Route::get('/show/{id}', [FlatController::class, 'show'])->name('show.flat');
    Route::post('/store', [FlatController::class, 'store'])->name('store.flat');
    Route::get('/edit/{id}', [FlatController::class, 'edit'])->name('edit.flat');
    Route::post('/update/{id}', [FlatController::class, 'update'])->name('update.flat');
    Route::delete('/delete/{id}', [FlatController::class, 'destroy'])->name('delete.flat');
});



// users
Route::prefix('users')->group(function () {
	Route::get('/', [UserController::class, 'index'])->name('users');
    Route::get('/create', [UserController::class, 'create'])->name('create.user');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('show.user');
    Route::post('/store', [UserController::class, 'store'])->name('store.user');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update.user');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete.user');
});



// user documents
Route::prefix('user_documents')->group(function () {
	Route::get('/', [UserDocumentController::class, 'index'])->name('user_documents');
    Route::get('/create', [UserDocumentController::class, 'create'])->name('create.user_document');
    Route::get('/show/{id}', [UserDocumentController::class, 'show'])->name('show.user_document');
    Route::post('/store', [UserDocumentController::class, 'store'])->name('store.user_document');
    Route::get('/edit/{id}', [UserDocumentController::class, 'edit'])->name('edit.user_document');
    Route::post('/update/{id}', [UserDocumentController::class, 'update'])->name('update.user_document');
    Route::delete('/delete/{id}', [UserDocumentController::class, 'destroy'])->name('delete.user_document');
});




// contracts
Route::prefix('contracts')->group(function () {
	Route::get('/', [ContractController::class, 'index'])->name('contracts');
    Route::get('/create', [ContractController::class, 'create'])->name('create.contract');
    Route::get('/show/{id}', [ContractController::class, 'show'])->name('show.contract');
    Route::post('/store', [ContractController::class, 'store'])->name('store.contract');
    Route::get('/edit/{id}', [ContractController::class, 'edit'])->name('edit.contract');
    Route::post('/update/{id}', [ContractController::class, 'update'])->name('update.contract');
    Route::delete('/delete/{id}', [ContractController::class, 'destroy'])->name('delete.contract');
});




// services
Route::prefix('services')->group(function () {
	Route::get('/', [ServiceController::class, 'index'])->name('services');
    Route::get('/create', [ServiceController::class, 'create'])->name('create.service');
    Route::get('/show/{id}', [ServiceController::class, 'show'])->name('show.service');
    Route::post('/store', [ServiceController::class, 'store'])->name('store.service');
    Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit.service');
    Route::post('/update/{id}', [ServiceController::class, 'update'])->name('update.service');
    Route::delete('/delete/{id}', [ServiceController::class, 'destroy'])->name('delete.service');
});



// requests
Route::prefix('requests')->group(function () {
	Route::get('/', [RequestController::class, 'index'])->name('requests');
    Route::get('/create', [RequestController::class, 'create'])->name('create.request');
    Route::get('/show/{id}', [RequestController::class, 'show'])->name('show.request');
    Route::post('/store', [RequestController::class, 'store'])->name('store.request');
    Route::get('/edit/{id}', [RequestController::class, 'edit'])->name('edit.request');
    Route::post('/update/{id}', [RequestController::class, 'update'])->name('update.request');
    Route::delete('/delete/{id}', [RequestController::class, 'destroy'])->name('delete.request');
});





// invoices
Route::prefix('invoices')->group(function () {
	Route::get('/', [InvoiceController::class, 'index'])->name('invoices');
    Route::get('/create', [InvoiceController::class, 'create'])->name('create.invoice');
    Route::get('/show/{id}', [InvoiceController::class, 'show'])->name('show.invoice');
    Route::post('/store', [InvoiceController::class, 'store'])->name('store.invoice');
    Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('edit.invoice');
    Route::post('/update/{id}', [InvoiceController::class, 'update'])->name('update.invoice');
    Route::delete('/delete/{id}', [InvoiceController::class, 'destroy'])->name('delete.invoice');
});



// payment_methods
Route::prefix('payment_methods')->group(function () {
	Route::get('/', [PaymentMethodController::class, 'index'])->name('payment_methods');
    Route::get('/create', [PaymentMethodController::class, 'create'])->name('create.payment_method');
    Route::get('/show/{id}', [PaymentMethodController::class, 'show'])->name('show.payment_method');
    Route::post('/store', [PaymentMethodController::class, 'store'])->name('store.payment_method');
    Route::get('/edit/{id}', [PaymentMethodController::class, 'edit'])->name('edit.payment_method');
    Route::post('/update/{id}', [PaymentMethodController::class, 'update'])->name('update.payment_method');
    Route::delete('/delete/{id}', [PaymentMethodController::class, 'destroy'])->name('delete.payment_method');
});



// notifications
Route::prefix('notifications')->group(function () {
	Route::get('/', [NotificationController::class, 'index'])->name('notifications');
    Route::delete('/delete/{id}', [NotificationController::class, 'destroy'])->name('delete.notification');
});
