<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(Request $request, User $user){
        // berfungsi dengan baik pada web cuman disini error
        // if (Auth::user()->hasfollow($user)) {
        //     Auth::user()->unfollow($user);
        // } else {
        //     Auth::user()->follow($user);
        // }
        
        Auth::user()->hasfollow($user) 
            ? Auth::user()->unfollow($user) 
            : Auth::user()->follow($user);
        return back();
    }
}
