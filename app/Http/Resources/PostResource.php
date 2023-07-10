<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $hasLike = 0;
        foreach ($this->like as $key => $like) {
            if ($like->user_id == Auth::user()->id) {
                $hasLike = 1;
            }
        }
        $comments = $this->comment->map(function ($comment) {
            return [
                "id" => $comment->id,
                "user_id" => $comment->user_id,
                "post_id" => $comment->post_id,
                "body" => $comment->body,
                "created_at" => $comment->created_at,
                "name" => $comment->user->name,
            ];
        });
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "body" => $this->body,
            "image" => $this->image,
            "updated_at" => $this->updated_at,
            "name" => $this->user->name,
            "like_count" => $this->like->count(),
            "hasLike" => $hasLike,
            "comment" => $comments,
        ];
    }
}
