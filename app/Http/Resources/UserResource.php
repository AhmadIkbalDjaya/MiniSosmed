<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $has_follow = false;
        $user = User::find(Auth::user()->id);
        if ($user->follows()->where('following_user_id', $this->id)->first()) {
            $has_follow = true;
        }
        return [
            "id" => $this->id,
            "username" => $this->username,
            "name" => $this->name,
            "profile_image" => $this->biodata->profile_image,
            "followers" => $this->followers->count(),
            "follows" => $this->follows->count(),
            "has_follow" => $has_follow,
        ];
    }
}
