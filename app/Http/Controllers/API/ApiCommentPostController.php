<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiCommentPostController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $request->validate([
            "body" => "required",
        ]);
        $data['body'] = $request->body;
        $data['post_id'] = $post_id;
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);
        return response()->base_response();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->base_response();
    }
}
