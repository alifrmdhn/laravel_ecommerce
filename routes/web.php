<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', ProductController::class)->middleware('auth');

Route::get('/login', function () {
  if (Auth::check()) return redirect('/product');
  return view('login');
})->name('login');

Route::get('/logout', function () {
  Auth::logout();
  return redirect('/login');
});

Route::post('/auth', [SiteController::class, 'auth']);

