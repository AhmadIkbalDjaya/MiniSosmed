<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;
use Illuminate\Auth\Events\Validated;

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

    public function updateBio(Request $request){
        $validateBio = $request->validate([
            'birthday' => '',
            'genre' => '',
            'address' => ''
        ]);
        Biodata::where('id', auth()->user()->biodata->id)->update($validateBio);
        return back();
    }
}
