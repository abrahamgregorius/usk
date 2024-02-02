<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/admin/users', [AdminController::class, 'users_get']);
Route::get('/admin/users/create', [AdminController::class, 'users_create']);
Route::post('/admin/users/create', [AdminController::class, 'users_store']);
Route::get('/admin/users/{id}', [AdminController::class, 'users_edit']);
Route::post('/admin/users/{id}', [AdminController::class, 'users_update']);
Route::get('/admin/users/{id}/delete', [AdminController::class, 'users_destroy']);
Route::get('/admin/transactions', [AdminController::class, 'transactions_get']);

Route::get('/bank/withdraw', [BankController::class, 'withdraw_get']);
Route::post('/bank/withdraw', [BankController::class, 'withdraw_post']);
Route::get('/bank/topup', [BankController::class, 'topup_get']);
Route::post('/bank/topup', [BankController::class, 'topup_post']);
Route::get('/bank/transactions/pending', [BankController::class, 'pending_get']);
Route::post('/bank/transactions/pending/{id}', [BankController::class, 'pending_post']);
Route::post('/bank/transactions/pending/{id}/reject', [BankController::class, 'reject_post']);
Route::get('/bank/transactions', [BankController::class, 'transactions_get']);

Route::get('/shop/products', [ShopController::class, 'products_get']);
Route::get('/shop/products/create', [ShopController::class, 'products_create']);
Route::post('/shop/products/create', [ShopController::class, 'products_store']);
Route::get('/shop/products/{id}', [ShopController::class, 'products_edit']);
Route::post('/shop/products/{id}', [ShopController::class, 'products_update']);
Route::post('/shop/products/{id}/delete', [ShopController::class, 'products_destroy']);
Route::get('/shop/transactions', [ShopController::class, 'transactions_get']);

Route::get('/student/products', [StudentController::class, 'products_get']);
Route::post('student/products/{id}/cart', [StudentController::class, 'products_post']);
Route::get('/student/withdraw', [StudentController::class, 'withdraw_get']);
Route::get('/student/topup', [StudentController::class, 'topup_get']);
Route::post('/student/withdraw', [StudentController::class, 'withdraw_post']);
Route::post('/student/topup', [StudentController::class, 'topup_post']);
Route::get('/student/cart', [StudentController::class, 'cart_get']);
Route::post('/student/cart', [StudentController::class, 'cart_post']);
Route::post('/student/cart/{id}/delete', [StudentController::class, 'cart_destroy']);
Route::get('/student/transactions', [StudentController::class, 'transactions_get']);
Route::get('/student/invoice/{code}', [StudentController::class, 'invoice']);
