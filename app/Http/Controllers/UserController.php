<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user){
        return view('profile', [
            "title" => "Profile $user->name",
            "active" => "profile",
            "user" => $user,
            "posts" => $user->post,
            "bio" => $user->biodata
        ]);
    }

    public function search(){
        return view('search', [
            "title" => "Pencarian",
            "active" => "search",
            "users" => User::search(request('search'))->get()
        ]);
    }
}
