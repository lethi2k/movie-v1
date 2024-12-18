<?php
use Illuminate\Support\Facades\Route;
use Modules\Movie\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [MovieController::class, 'index'])->name('home.index');
Route::get('/request', [MovieController::class, 'request'])->name('home.request');
Route::get('/contact', [MovieController::class, 'contact'])->name('home.contact');
Route::get('/faq', [MovieController::class, 'faq'])->name('home.faq');
Route::get('/danh-muc', [MovieController::class, 'category'])->name('home.category');
Route::get('/xem-phim/{slug}', [MovieController::class, 'preview'])->name('home.preview');
Route::get('/xem-phim/{slug}/{episode}', [MovieController::class, 'show'])->name('home.detail');
Route::get('/login', [MovieController::class, 'login'])->name('home.login');
Route::post('/verify-account', [MovieController::class, 'verifyAccount'])->name('home.verify-account');
Route::get('/forgot-password', [MovieController::class, 'forgotPassword'])->name('home.forgot-password');
Route::get('/register', [MovieController::class, 'register'])->name('home.register');
Route::post('/sign-up', [MovieController::class, 'signUp'])->name('home.sign-up');
Route::get('/sign-out', [MovieController::class, 'signOut'])->name('home.sign-out');
// Route::fallback(function () {
//     return redirect()->route('home.index');
// });