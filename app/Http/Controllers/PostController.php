<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedPost = $request->validate([
            'body' => 'required',
            'image' => 'image|file|max:10240',
        ]);

        if($request->file('image')){
            $validatedPost['image'] = $request->file('image')->store('post-images');
        }

        $validatedPost['user_id'] = auth()->user()->id;
    
        Post::create($validatedPost);
    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedPost = $request->validate([
            'body' => 'required',
            'image' => 'image|file|max:10240',
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedPost['image'] = $request->file('image')->store('post-images');
        }
    
        Post::where('id', $post->id)->update($validatedPost);
    
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return back();
    }

    public function readPost(){
        $following = Auth::user()->follows->pluck('id');
        return view('partials.posts', [
            "posts" => Post::whereIn('user_id', $following)
                    ->orWhere('user_id', Auth::user()->id)
                    ->latest()->get()
        ]);
    }
    public function readPostSelf($user_id){
        return view('partials.posts', [
            "posts" => Post::Where('user_id', $user_id)->latest()->get()
        ]);
    }
}
