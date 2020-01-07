<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => ['required', 'string', 'max:30'],
            'image' => ['image'],
        ]);

        $imgPath = request('image')->store('uploads', 'public');

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imgPath,
        ]);

        return redirect('/'); // '/profile/' . auth()->user()->id
    }
}
