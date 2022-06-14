<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class RegisterController extends Controller
{
    
    public function index(){
        return view('register.index', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            // 'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        $validated['username'] = SlugService::createSlug(User::class, 'username', $request->name);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        $biodata = [
            'user_id' => $user->id
        ];
        Biodata::create($biodata);
        return redirect('/login')->with('success', 'Registrasion Successfull, Please Login');
    }
}
