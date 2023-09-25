<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class ApiFollowController extends Controller
{
    public function follow(User $user)
    {
        Auth::user()->hasfollow($user)
            ? Auth::user()->unfollow($user)
            : Auth::user()->follow($user);
        return response()->base_response();
    }

    public function friend_suggest()
    {
        $following = Auth::user()->follows->pluck('id');
        $users_suggest = User::all()->whereNOTIn('id', $following)->whereNOTIn('id', Auth::user()->id);
        return response()->base_response(UserResource::collection($users_suggest), 200);
    }
}
