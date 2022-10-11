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

Route::get('/auth', function () {
    return view('adminHome');
})->name('welcome');

Auth::routes();

//articles

Route::get('/', [App\Http\Controllers\ArticlesController::class, 'index'])->name('articles.index');
Route::get('/show/{id}', [App\Http\Controllers\ArticlesController::class, 'show'])->name('article.show');

Route::post('/store/{id}',[App\Http\Controllers\CommentsController::class,'store'])->name('comment.post');

Route::group(['middleware'=>['auth']],function(){
    Route::get('/create',[App\Http\Controllers\ArticlesController::class,'create'])->name('article.create');
    Route::post('/create/post',[App\Http\Controllers\ArticlesController::class,'store'])->name('article.post');
    Route::get('/create/edit/{id}',[App\Http\Controllers\ArticlesController::class,'edit'])->name('article.edit');
    Route::put('/create/update/{id}',[App\Http\Controllers\ArticlesController::class,'update'])->name('article.update');
    Route::delete('/create/delete/{id}',[App\Http\Controllers\ArticlesController::class,'destroy'])->name('article.delete');
});
