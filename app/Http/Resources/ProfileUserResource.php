<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "username" => $this->username,
            "name" => $this->name,
            "profile_image" => $this->biodata->profile_image,
            "cover_image" => $this->biodata->cover_image,
            "followers" => $this->followers->count(),
            "follows" => $this->follows->count(),
            "birthday" => $this->biodata->birthday,
            "gender" => $this->biodata->genre,
            "address" => $this->biodata->address,
        ];
    }
}
