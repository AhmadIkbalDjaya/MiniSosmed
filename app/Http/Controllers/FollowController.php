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
    public function followDashboard($user_id){
        $user = User::where('id', $user_id)->first();
        Auth::user()->hasfollow($user) 
            ? Auth::user()->unfollow($user) 
            : Auth::user()->follow($user);
    }

    public function readSaranTeman(){
        $following = Auth::user()->follows->pluck('id');
        return view("partials.saranTeman", [
            "users" => User::all()->whereNOTIn('id', $following)->whereNOTIn('id', Auth::user()->id)
        ]);
    }
}
