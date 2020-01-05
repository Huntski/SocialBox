<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => ['required', 'string', 'max:30'],
            'image' => ['required', 'image'],
        ]);
        dd(request()->all());
    }
}
