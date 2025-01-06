<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Ecommerce\Api\CategoryController;
use Modules\Admin\Http\Controllers\Ecommerce\Api\CustomerController;
use Modules\Admin\Http\Controllers\Ecommerce\Api\ProductController;
use Modules\Admin\Http\Controllers\Ecommerce\Api\TagController;
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
        Route::post('list/filter', [ProductController::class, 'filter'])->name('admin-api.product.list.filter');
        Route::get('create', [ProductController::class, 'create'])->name('admin-api.product.create');
        Route::post('store', [ProductController::class, 'store'])->name('admin-api.product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin-api.product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('admin-api.product.update');
        Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('admin-api.product.destroy');
        Route::post('destroy/multiple', [ProductController::class, 'destroyMultiple'])->name('admin-api.product.destroy.multiple');
    });
    
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin-api.category.list');
        Route::get('trash', [CategoryController::class, 'trash'])->name('admin-api.category.trash');
        Route::post('store', [CategoryController::class, 'store'])->name('admin-api.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin-api.category.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('admin-api.category.update');
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('admin-api.category.destroy');
        Route::post('change/status', [CategoryController::class, 'changeStatus'])->name('admin-api.category.change.status');
    });
    
    Route::prefix('users')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('admin-api.users.list');
        Route::post('store', [CustomerController::class, 'store'])->name('admin-api.users.store');
        Route::get('destroy/{id}', [CustomerController::class, 'destroy'])->name('admin-api.users.destroy');
        Route::delete('destroy/multiple', [CustomerController::class, 'destroyMultiple'])->name('admin-api.users.destroy.multiple');
    });

    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('admin-api.tags.list');
        Route::post('store', [TagController::class, 'store'])->name('admin-api.tags.store');
        Route::get('edit/{id}', [TagController::class, 'edit'])->name('admin-api.tags.edit');
        Route::post('update/{id}', [TagController::class, 'update'])->name('admin-api.tags.update');
        Route::get('destroy/{id}', [TagController::class, 'destroy'])->name('admin-api.tags.destroy');
    });
});

Route::prefix('products')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('home.products.index');
    Route::get('/list', [MovieController::class, 'products'])->name('home.products.list');
    Route::get('/last-update', [MovieController::class, 'lastUpdate'])->name('home.last-update');
    Route::get('/trends', [MovieController::class, 'productsTrend'])->name('home.product-trend');
    Route::get('/{slug}', [MovieController::class, 'show'])->name('home.detail');
});

Route::get('/categories', [MovieController::class, 'categories'])->name('home.category');
