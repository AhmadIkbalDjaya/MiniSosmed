<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function commentStore(Request $request, $post_id){
        
        $data['body'] = $request->body;
        $data['post_id'] = $post_id;
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);
    }

    public function commentDestroy($comment_id){
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();
    }
}
