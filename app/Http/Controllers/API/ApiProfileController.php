<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiProfileController extends Controller
{
    public function  index(User $user) {
        $data = [
            "user" => $user,
            "posts" => $user->post->sortByDesc('created_at'),
            "bio" => $user->biodata,
        ];
        return response()->base_response($data);
    }

    public function search() {
        return response()->base_response(User::search(request('search'))->get());
    }
}
