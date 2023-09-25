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
        $user = User::find($this->id);
        $has_follow = Auth::user()->hasFollow($user) ? true : false;
        return [
            "id" => $this->id,
            "username" => $this->username,
            "name" => $this->name,
            "profile_image" => url("storage/" . $this->biodata->profile_image),
            "followers" => $this->followers->count(),
            "follows" => $this->follows->count(),
            "has_follow" => $has_follow,
        ];
    }
}
