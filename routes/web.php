<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class , 'index'])->name('posts.index');
Route::get('/post/{post}',[PostController::class , 'show'])->name('post.show');
Route::post('/post/{post}',[CommentController::class , 'store'])->name('comment.store');
Route::get('/create' ,[PostController::class , 'create'])->name('posts.create');
Route::post('/store',[PostController::class , 'store'])->name('post.store');


