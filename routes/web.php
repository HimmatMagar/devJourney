<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FetchData;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class) -> group(function() {

    //Guest Middleware
    Route::group(['middleware' => 'guest'], function() {
        Route::get('login', 'loginPage') -> name('loginPage');
        Route::get('signup', 'signupPage') -> name('signupPage');
        Route::post('login', 'login') -> name('login');
        Route::post('signup', 'signup') -> name('signup');    
    });

    //Authenticated Middleware
    Route::group(['middleware' => 'auth'], function() {
        Route::get('logout', 'logout') -> name('logout');
        Route::get('/', [FetchData::class, 'searchFunction']) -> name('home');
        Route::get('/show/{id}', [FetchData::class, 'showOnePost']) -> name('show');
        Route::view('about', 'about') -> name('about');
        Route::view('contact', 'contact') -> name('contact');
        Route::resource('blog', PostController::class) -> middleware(AuthCheck::class);
        Route::view('update', 'update') -> name('update');
        Route::post('request', [EmailController::class, 'upgradeRoleEmail']) -> name('upgrade-role-request');
        Route::post('comment/{post_id}', [CommentController::class, 'comment']) -> name('comment');
        Route::post('like/{postId}', [LikeController::class, 'giveLike']) -> name('like');
    });
});
    

