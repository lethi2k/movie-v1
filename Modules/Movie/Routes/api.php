<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Ecommerce\Api\CategoryController;
use Modules\Admin\Http\Controllers\Ecommerce\Api\ProductController;
use Modules\Movie\Http\Controllers\Api\MovieController;

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

Route::middleware('auth:api')->get('/movie', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('list/filter', [ProductController::class, 'filter'])->name('admin.product.list.filter');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        Route::post('destroy/multiple', [ProductController::class, 'destroyMultiple'])->name('admin.product.destroy.multiple');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.list');
        Route::get('trash', [CategoryController::class, 'trash'])->name('admin.category.trash');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        Route::post('change/status', [CategoryController::class, 'changeStatus'])->name('admin.category.change.status');
    });
});


Route::prefix('products')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('home.products.index');
    Route::get('/last-update', [MovieController::class, 'lastUpdate'])->name('home.last-update');
    Route::get('/{slug}', [MovieController::class, 'show'])->name('home.detail');
    Route::get('/trends', [MovieController::class, 'productsTrend'])->name('home.product-trend');
});

Route::get('/categories', [MovieController::class, 'categories'])->name('home.category');
