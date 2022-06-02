<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user){
        return view('profile', [
            "title" => "Profile $user->username",
            "active" => "profile",
            "user" => $user,
            "posts" => $user->post,
            "bio" => $user->biodata
        ]);
    }
}
