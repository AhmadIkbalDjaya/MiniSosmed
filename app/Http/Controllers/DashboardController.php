<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $following = Auth::user()->follows->pluck('id');
        return view('dashboard', [
            "title" => "Minsos",
            "posts" => Post::whereIn('user_id', $following)
                            ->orWhere('user_id', Auth::user()->id)
                            ->latest()->get()
        ]);
    }
}
