<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\API\ApiPostController;
use App\Http\Controllers\API\ApiFollowController;
use App\Http\Controllers\API\ApiProfileController;
use App\Http\Controllers\API\ApiDashboardController;
use App\Http\Controllers\API\ApiCommentPostController;
use App\Http\Controllers\API\ApiAuthenticationController;

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

Route::controller(ApiAuthenticationController::class)->group(function () {
    Route::post('login', 'login');
    Route::get('logout', 'logout')->middleware(['auth:sanctum']);
    Route::post('register', 'register');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('dashboard', [ApiDashboardController::class, 'index']);

    Route::get('profile/{user:username}', [ApiProfileController::class, 'index']);
    Route::get('profile/posts/{user:username}', [ApiProfileController::class, 'posts']);
    Route::post('profile/updateBio', [ApiProfileController::class, 'updateBio']);

    Route::get('user/followers/{user:username}', [ApiProfileController::class, 'userFollowers']);
    Route::get('user/following/{user:username}', [ApiProfileController::class, 'userFollowing']);

    Route::get('search', [ApiProfileController::class, 'search']);

    Route::post('follow/{user:username}', [ApiFollowController::class, 'follow']);
    Route::get('friend_suggest', [ApiFollowController::class, 'friend_suggest']);

    Route::post('post', [ApiPostController::class, 'store']);
    Route::put('post/{post}', [ApiPostController::class, 'update']);
    Route::delete('post/{post}', [ApiPostController::class, 'destroy']);

    Route::get('like/{id}', [ApiPostController::class, 'like']);

    Route::controller(ApiCommentPostController::class)->group(function () {
        Route::get('/comment/{post}', 'postComment');
        Route::post('/comment/{post_id}', 'store');
        Route::delete('comment/{comment}', 'destroy');
    });
});
