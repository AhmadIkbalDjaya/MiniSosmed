<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
