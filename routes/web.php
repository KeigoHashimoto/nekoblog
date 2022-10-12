<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/auth',[App\Http\Controllers\AdminController::class,'index'] )->name('welcome');

Route::get('/auth/register/nekoblog/create',[App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/auth/register/nekoblog/post',[App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register.post');
Route::get('/login',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login.post');
Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

//articles

Route::get('/', [App\Http\Controllers\ArticlesController::class, 'index'])->name('articles.index');
Route::get('/show/{id}', [App\Http\Controllers\ArticlesController::class, 'show'])->name('article.show');
Route::get('/tagSarch/{id}',[App\Http\Controllers\ArticlesController::class,'tagSarch'])->name('articles.sarch');

Route::get('/comment/create/{id}',[App\Http\Controllers\CommentsController::class,'create'])->name('comment.create');
Route::post('/comment/store/{id}',[App\Http\Controllers\CommentsController::class,'store'])->name('comment.post');

Route::group(['middleware'=>['auth']],function(){
    Route::get('/create',[App\Http\Controllers\ArticlesController::class,'create'])->name('article.create');
    Route::post('/article/post',[App\Http\Controllers\ArticlesController::class,'store'])->name('article.post');
    Route::get('/article/edit/{id}',[App\Http\Controllers\ArticlesController::class,'edit'])->name('article.edit');
    Route::put('/article/update/{id}',[App\Http\Controllers\ArticlesController::class,'update'])->name('article.update');
    Route::delete('/article/delete/{id}',[App\Http\Controllers\ArticlesController::class,'destroy'])->name('article.delete');
    Route::delete('/comments/delete/{id}',[App\Http\Controllers\CommentsController::class,'destroy'])->name('comment.delete');
});
