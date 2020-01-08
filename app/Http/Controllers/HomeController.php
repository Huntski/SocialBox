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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = [];
        foreach (\App\Post::orderBy('created_by', 'DESC')->get() as $post) {
            $u = \App\User::find($post->user_id);
            if ($u) {
                $p = (object) [
                    'username' => $u->username,
                    'avatar' => $u->profile->image(),
                    'image' => $post->image(),
                    'caption' => $post->caption,
                    'description' => $post->description,
                    'date' => $post->created_at->format('M j Y'),
                ];
                array_push($posts, $p);
            }
        }

        $user = auth()->user();

        return view('index',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
