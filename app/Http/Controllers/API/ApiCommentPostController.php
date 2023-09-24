<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Post;

class ApiCommentPostController extends Controller
{
    public function postComment(Post $post)
    {
        $comments = Comment::where("post_id", $post->id)->get();
        return response()->base_response(CommentResource::collection($comments),);
    }

    public function store(Request $request, $post_id)
    {
        $request->validate([
            "body" => "required",
        ]);
        $data['body'] = $request->body;
        $data['post_id'] = $post_id;
        $data['user_id'] = auth()->user()->id;

        try {
            $comment = Comment::create($data);
            return response()->base_response($comment, 201);
        } catch (\Throwable $th) {
            return response()->base_response(null, 500, "Internal Server Error", $th->getMessage());
        }
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->base_response();
    }
}
