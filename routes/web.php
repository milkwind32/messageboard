<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
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
Route::get('/',[ArticleController::class, 'index']);
Route::resource('/article', 'ArticleController')->middleware('check');

Route::get('/login',[LoginController::class, 'index']);
Route::post('/login',[LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register/{id}/edit', [UserController::class, 'edit'])->middleware('check');
Route::resource('/register', 'UserController');

Route::resource('/comment', 'CommentController')->middleware('check');


Route::get('test', [TestController::class, 'index'])->name('test.index')->middleware('check');
Route::post('test', [TestController::class, 'testAjax'])->name('test.ajax');


