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
            // "posts" => Post::latest()->get(),
            "posts" => Post::whereIn('user_id', $following)
                            ->orWhere('user_id', Auth::user()->id)
                            ->latest()->get(),
            // "users" => User::all()
            // "users" => User::all()->whereNOTIn('id', $following)->whereNOTIn('id', Auth::user()->id)
            // DB::table("users")->select('*')
            // ->whereNOTIn('id',$following)
            // ->get()
        ]);
    }
}
