<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $followingIds = auth()->user()->following()->pluck('profiles.user_id');
        //$posts = Post::whereIn('user_id',$followingIds)->latest()->get(); // without pagination
        //$posts = Post::whereIn('user_id',$followingIds)->latest()->paginate(3); // queury for user everytime
        $posts = Post::whereIn('user_id', $followingIds)->with('user')->latest()->paginate(3);
        // dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption'=>'required',
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        $imageurl = request('image')->store('uploads', 'public');
        $image  = Image::make(public_path("storage/{$imageurl}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image'   => $imageurl,
        ]);
        // \App\Post::create($data);
        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        //dd($post);
        //  $user=\App\User::findOrFail($post->user_id);
        return view('posts.show', compact('post'));
    }
}
