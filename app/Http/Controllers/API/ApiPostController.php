<?php

namespace App\Http\Controllers\API;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApiPostController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "body" => "required",
            "image" => "image|nullable",
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images');
        }

        $validated['user_id'] = auth()->user()->id;

        Post::create($validated);
        return response()->base_response();
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => 'required',
            'image' => 'image|file|max:10240',
        ]);

        if ($request->file('image')) {
            if ($post->image) {
                Storage::delete($request->image);
            }
            $validated['image'] = $request->file('image')->store('post-images');
        }

        Post::where('id', $post->id)->update($validated);
        return response()->base_response();
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return response()->base_response();
    }

    public function like($post_id)
    {
        $like = Like::where('post_id', $post_id)->where('user_id', auth()->user()->id)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'post_id' => $post_id,
                'user_id' => auth()->user()->id
            ]);
        }
        return response()->base_response();
    }
}
