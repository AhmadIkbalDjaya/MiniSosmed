<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/profile/{user:username}', [UserController::class, 'index'])->middleware('auth');
Route::get('/profile/followList/{user:username}', [UserController::class, 'followList'])->middleware('auth');
Route::post('/profile/bio', [UserController::class, 'updateBio'])->middleware('auth');
Route::post('/profile/image', [UserController::class, 'updateImage'])->middleware('auth');

Route::get('/search', [UserController::class, 'search'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::post('/createPost', [PostController::class, 'storePost'])->middleware('auth');
Route::resource('/post', PostController::class)->middleware('auth');
Route::get('/commentStore/{post_id}', [CommentController::class, 'commentStore'])->middleware('auth');
Route::get('/commentDelete/{comment_id}', [CommentController::class, 'commentDestroy'])->middleware('auth');
// Route::resource('/comment', CommentController::class)->middleware('auth');
Route::get('/like/{id}', [LikeController::class, 'like'])->middleware('auth');

Route::post('/follow/{user:username}', [FollowController::class, 'store'])->middleware('auth');
Route::get('/followDashboard/{id}', [FollowController::class, 'followDashboard']);

Route::get('read', [PostController::class, 'readPost']);
Route::get('read/self/{user_id}', [PostController::class, 'readPostSelf']);
Route::get('readSaranTeman', [FollowController::class, 'readSaranTeman']);