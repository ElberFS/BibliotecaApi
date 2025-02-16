<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas para la entidad "Category"
Route::apiResource('categories', CategoryController::class);

// Rutas para la entidad "Book"
Route::apiResource('books', BookController::class);

// Rutas para la entidad "Movie"
Route::apiResource('movies', MovieController::class);

// Rutas para la entidad "Loan"
Route::apiResource('loans', LoanController::class);