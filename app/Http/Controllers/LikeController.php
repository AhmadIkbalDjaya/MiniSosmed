<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;


class LikeController extends Controller
{
    public function like($post_id){
        $like = Like::where('post_id', $post_id)->where('user_id', auth()->user()->id)->first();

        if ($like) {
            $like->delete();
            return back();
        } else {
            Like::create([
                'post_id' => $post_id,
                'user_id' => auth()->user()->id
            ]);
            return back();
        }
    }
}
