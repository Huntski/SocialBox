<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class ProfilesController extends Controller
{
    public function index($user = null)
    {
        if ($user == null) {
            $user = auth()->user();

            $inputs = [
                'banner' => 'file',
                'avatar' => 'file',
                'description' => 'text',
                'url' => 'text'
            ];
        } else {
            $inputs;
            $user = User::findOrFail($user);
        }

        $posts = [];
        foreach($user->posts as $post) {
            $p = (object) [
                'id' => $post->id,
                'caption' => $post->caption,
                'image' => $post->image,
                'date' => $post->created_at->format('M j Y'),
            ];
            array_push($posts, $p);
        }

        krsort($posts);

        return view('user.profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
