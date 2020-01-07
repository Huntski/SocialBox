<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = \App\Post::all();
        $valid_posts = [];
        foreach ($posts as $post) {
            $post__user = \App\User::find($post->user_id);
            if ($post__user) {
                $public_post = (object) [
                    'user' => $post__user,
                    'post' => $post,
                ];
            }
        }

        $user = auth()->user();

        return view('index',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
