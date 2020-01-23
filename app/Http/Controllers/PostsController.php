<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{
    /**
     * Stores a POSTed post.
     * @return void
     */

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

        return redirect('/');
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('profile.show');
    }
}
