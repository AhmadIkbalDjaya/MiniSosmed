<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\ProfileUserResource;
use App\Http\Resources\UserResource;
use App\Models\Biodata;
use Clockwork\Support\Symfony\ProfileTransformer;

class ApiProfileController extends Controller
{
    public function  index(User $user)
    {
        return response()->base_response(new ProfileUserResource($user));
    }

    public function posts(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->get();
        return response()->base_response(PostResource::collection($posts));
    }

    public function search()
    {
        $users = User::search(request('search'))->get();
        return response()->base_response(UserResource::collection($users));
    }

    public function updateBio(Request $request)
    {
        $validated = $request->validate([
            "birthday" => "nullable|date",
            "genre" => "nullable|in:Laki-Laki,Perempuan",
            "address" => 'nullable',
        ]);
        Biodata::where("id", auth()->user()->biodata->id)->update($validated);
        return response()->base_response();
    }

    public function  userFollowers(User $user)
    {
        $data = $user->followers()->get();
        return response()->base_response(UserResource::collection($data));
    }

    public function  userFollowing(User $user)
    {
        $data = $user->follows()->get();
        return response()->base_response(UserResource::collection($data));
    }
}
