<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(Request $request, User $user){
        Auth::user()->hasfollow($user) 
            ? Auth::user()->unfollow($user) 
            : Auth::user()->follow($user);
        return back();
    }
}
