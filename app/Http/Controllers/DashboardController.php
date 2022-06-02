<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            "title" => "Minsos",
            "active" => "dashboard",
            "posts" => Post::latest()->get(),
            "users" => User::all()
        ]);
    }
}
