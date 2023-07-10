<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class ApiDashboardController extends Controller
{
    public function index()
    {
        $following = Auth::user()->follows->pluck('id');
        $posts = Post::whereIn('user_id', $following)
                ->orWhere('user_id', Auth::user()->id)
                ->latest()->get();
        return response()->base_response(PostResource::collection($posts));
    }
}
