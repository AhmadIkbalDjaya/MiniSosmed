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
        $data['access_token'] = $user->createToken('login_token')->plainTextToken;
        $data["user_id"] = $user->id;
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
}
