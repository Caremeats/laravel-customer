<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('customers', [CustomerController::class, 'getAllCustomers']);
// Route::post('customers/create', [CustomerController::class, 'create'])->name('customers.create');

Route::post('customers', [CustomerController::class, 'create'])->name('customers.create');


Route::put('customers/{id}', [CustomerController::class, 'updateCustomer']);


Route::delete('customers/{id}', [CustomerController::class, 'deleteCustomer']);
