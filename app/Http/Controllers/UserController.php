<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function index(User $user){
        return view('profile', [
            "title" => "Profile $user->name",
            "user" => $user,
            "posts" => $user->post->sortByDesc('created_at'),
            // "posts" => Post::where('user_id', $user->id)->latest()->get(),
            "bio" => $user->biodata
        ]);
    }

    public function search(){
        return view('search', [
            "title" => "Pencarian",
            "users" => User::search(request('search'))->get()
        ]);
    }
}
