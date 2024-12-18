<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Ecommerce\Api\ProductController;

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

Route::middleware('auth:api')->get('/admins', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.product.list.all');
    Route::post('list/filter', [ProductController::class, 'filter'])->name('admin.product.list.filter');
    Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::post('destroy/multiple', [ProductController::class, 'destroyMultiple'])->name('admin.product.destroy.multiple');
});
