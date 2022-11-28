<?php

use App\Http\Controllers\TimelineController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', TimelineController::class )->middleware(['auth', 'verified'])->name('dashboard');
Route::group(["prefix" => "post"], function(){
    Route::post('', \App\Http\Controllers\Post\StorePostController::class)->name('post.store');
    Route::get('/{post}', \App\Http\Controllers\Post\ShowPostController::class)->name('post.show');
    Route::post('/{post}/comment', \App\Http\Controllers\Post\PostStoreCommentController::class)->name('post.comment.store');
    Route::delete('/{post}/comment/{comment}', \App\Http\Controllers\Post\DeleteCommentController::class)->name('post.comment.destroy');
    Route::get('/{post}/edit', \App\Http\Controllers\Post\EditPostController::class)->name('post.edit');
    Route::put('/{post}/edit', \App\Http\Controllers\Post\UpdatePostController::class)->name('post.update');

} );


require __DIR__.'/auth.php';