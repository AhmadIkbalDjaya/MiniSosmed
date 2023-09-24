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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// loginRegis
Route::controller(ApiAuthenticationController::class)->group(function () {
    Route::post('login', 'login');
    Route::get('authUser', 'authUser')->middleware(["auth:sanctum"]);
    Route::get('logout', 'logout')->middleware(['auth:sanctum']);
    Route::post('register', 'register');
});

Route::get('tes', function () {
    return response()->base_response(User::all());
});

Route::get('dashboard', [ApiDashboardController::class, 'index'])->middleware(['auth:sanctum']);

Route::get('profile/{user:username}', [ApiProfileController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('profile/posts/{user:username}', [ApiProfileController::class, 'posts'])->middleware(['auth:sanctum']);
Route::post('profile/updateBio', [ApiProfileController::class, 'updateBio'])->middleware(['auth:sanctum']);

Route::get('user/followers/{user:username}', [ApiProfileController::class, 'userFollowers'])->middleware(['auth:sanctum']);
Route::get('user/following/{user:username}', [ApiProfileController::class, 'userFollowing'])->middleware(['auth:sanctum']);

Route::get('search', [ApiProfileController::class, 'search'])->middleware(['auth:sanctum']);

Route::post('follow/{user:username}', [ApiFollowController::class, 'follow'])->middleware(['auth:sanctum']);

Route::post('post', [ApiPostController::class, 'store'])->middleware(['auth:sanctum']);
Route::put('post/{post}', [ApiPostController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('post/{post}', [ApiPostController::class, 'destroy'])->middleware(['auth:sanctum']);

Route::get('like/{id}', [ApiPostController::class, 'like'])->middleware(['auth:sanctum']);

Route::controller(ApiCommentPostController::class)->group(function () {
    Route::get('/comment/{post}', 'postComment')->middleware(['auth:sanctum']);
    Route::post('/comment/{post_id}', 'store')->middleware(['auth:sanctum']);
    Route::delete('comment/{comment}', 'destroy')->middleware(['auth:sanctum']);
});
