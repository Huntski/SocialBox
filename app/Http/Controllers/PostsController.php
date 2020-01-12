<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create', [
            'user' => auth()->user(),
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => ['required', 'string', 'max:250'],
            'image' => ['image'],
        ]);

        if (request('image'))
            $imgPath = request('image')->store('uploads', 'public');
        else
            $imgPath = '';

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imgPath,
        ]);

        return redirect('/'); // '/profile/' . auth()->user()->id
    }
}
