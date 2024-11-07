<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"]);
Route::get("/products/{id}", [ProductController::class, "show"])->name(
    "products.show"
);


Route::get('update-status/{id}', [ProductController::class, "UpdateStatus"])->name('update.status');
Route::post('review-store', [ProductController::class, "reviewstore"])->name('review.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
