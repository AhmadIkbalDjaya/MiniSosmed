<?php

namespace App\Http\Resources;

use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "username" => $this->user->username,
            "body" => $this->body,
            "image" => $this->image != null ? url("storage/$this->image") : null,
            "updated_at" => $this->updated_at->diffForHumans(),
            "name" => $this->user->name,
            "like_count" => $this->like->count(),
            "hasLike" => $hasLike,
            "comment_count" => $this->comment->count(),
        ];
    }
}
