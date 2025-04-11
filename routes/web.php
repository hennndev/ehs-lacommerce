<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


Route::prefix("admin")->group(function () {
  Route::prefix("categories")->controller(CategoriesController::class)->group(function () {
    Route::get("/", "index")->name("categories.index");
    Route::get("/add", "add")->name("categories.add");
    Route::get("/edit/{id}", "edit")->name("categories.edit");

    Route::post("/", "store")->name("categories.store");
    Route::put("/{id}", "update")->name("categories.update");
    Route::delete("/{id}", "destroy")->name("categories.destroy");
  });

  Route::prefix("brands")->controller(BrandsController::class)->group(function() {
    Route::get("/", "index")->name("brands.index");
    Route::get("/add", "add")->name("brands.add");
    Route::get("/edit/{id}", "edit")->name("brands.edit");

    Route::post("/", "store")->name("brands.store");
    Route::put("/{id}", "update")->name("brands.update");
    Route::delete("/{id}", "destroy")->name("brands.destroy");
  });

  Route::prefix("products")->controller(ProductsController::class)->group(function() {
    Route::get("/", "index")->name("products.index");
    Route::get("/add", "add")->name("products.add");
    Route::get("/edit/{id}", "edit")->name("products.edit");

    Route::post("/", "store")->name("products.store");
    Route::put("/{id}", "update")->name("products.update");
    Route::delete("/{id}", "destroy")->name("products.destroy");
  });
});

