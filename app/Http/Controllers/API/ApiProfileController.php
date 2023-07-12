<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\ProfileUserResource;
use App\Http\Resources\UserResource;
use Clockwork\Support\Symfony\ProfileTransformer;

class ApiProfileController extends Controller
{
    public function  index(User $user)
    {
        return response()->base_response(new ProfileUserResource($user));
    }

    public function posts(User $user)
    {
        // dd($user->id);
        $posts = Post::where('user_id', $user->id)->latest()->get();
        // dd($posts);
        return response()->base_response(PostResource::collection($posts));
    }
    public function search()
    {
        $users = User::search(request('search'))->get();
        return response()->base_response(UserResource::collection($users));
    }
}
