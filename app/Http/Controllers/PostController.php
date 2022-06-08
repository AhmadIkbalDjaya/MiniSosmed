<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function storePost(Request $request){
        $validatedPost = $request->validate([
            'body' => 'required'
        ]);
        $validatedPost['user_id'] = auth()->user()->id;

        Post::create($validatedPost);

        return redirect('/');
    }
}
