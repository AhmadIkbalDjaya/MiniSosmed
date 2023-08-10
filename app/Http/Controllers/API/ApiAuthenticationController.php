<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ApiAuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->base_response('', 401, "Unauthorized", "Incorrect email or password");
        }
        $data = [
            'token' => $user->createToken('login_token')->plainTextToken,
            // 'user_id' => $user->id,
            // 'name' => $user->name,
            // 'username' => $user->username,
            // 'email' => $user->email,
            // 'profile_image' => $user->biodata->profile_image,
        ];
        return response()->base_response($data, 200, "OK", "Login Success");
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->base_response('', 200, "OK", "Logout Success");
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        $validated['username'] = SlugService::createSlug(User::class, 'username', $request->name);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        $biodata = [
            'user_id' => $user->id
        ];
        Biodata::create($biodata);
        return response()->base_response('', 200, "OK", "Registrasion Success");
    }

    public function  authUser() {
        return response()->base_response([
            "user" => auth()->user(),
        ]);
    }
}
