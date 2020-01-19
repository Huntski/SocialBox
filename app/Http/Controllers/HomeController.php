<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $posts = [];
        foreach (\App\Post::all() as $post) {
            $u = \App\User::find($post->user_id);
            if ($u) {
                $p = (object) [
                'username' => $u->username,
                    'avatar' => $u->profile->avatar(),
                    'image' => $post->image(),
                    'caption' => $post->caption,
                    'description' => $post->description,
                    'date' => $post->created_at->format('M j Y'),
                ];
                array_push($posts, $p);
            }
        }

        krsort($posts);

        $user = auth()->user();
        if (!$user->profile) abort(404, 'user profile not found');

        return view('home',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
