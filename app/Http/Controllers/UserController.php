<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(User $user){
        return view('profile', [
            "title" => "Profile $user->name",
            "user" => $user,
            "posts" => $user->post->sortByDesc('created_at'),
            // "posts" => Post::where('user_id', $user->id)->latest()->get(),
            "bio" => $user->biodata,
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

    public function updateImage(Request $request){
        $validatedImage = $request->validate([
            'profile_image' => 'image|file|max:10240',
            'cover_image' => 'image|file|max:10240',
        ]);

        if($request->file('profile_image')){
            if($request->oldProfileImage && $request->oldProfileImage !== 'profile-images/defaultProfile.png'){
                Storage::delete($request->oldProfileImage);
            }
            $validatedImage['profile_image'] = $request->file('profile_image')->store('profile-images');
        }
        if($request->file('cover_image')){
            if($request->oldCoverImage && $request->oldCoverImage !== 'cover-images/defaultCover.jpg'){
                Storage::delete($request->oldCoverImage);
            }
            $validatedImage['cover_image'] = $request->file('cover_image')->store('cover-images');
        }
    
        Biodata::where('user_id', auth()->user()->id)->update($validatedImage);
        return back();
    }
}
