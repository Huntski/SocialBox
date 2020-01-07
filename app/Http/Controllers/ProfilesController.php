<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

class ProfilesController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('profile.view', [
            'user' => $user,
        ]);
    }

    public function inspect($user)
    {
        $user = User::findOrFail($user);

        return view('profile.view', [
            'user' => $user,
        ]);
    }

    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', [
        'user' => $user,
        ]);
    }

    public function modify()
    {
        $profile = auth()->user()->profile;

        $data = request()->validate([
            'title' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:250'],
            'image' => ['nullable', 'image'],
            'url' => ['nullable', 'string', 'max:100'],
        ]);

        $profile->title = $data['title']; // Update profiles title
        $profile->description = $data['description']; // Update profiles description
        $profile->url = $data['url']; // Update profiles url

        if (request('image')) {
            $image_path = public_path("storage/{$profile->image}");
            if(File::exists($image_path)) { // Check if profile already has a image
                File::delete($image_path); // If it does remove old image
            }
            $imgPath = request('image')->store('uploads', 'public'); // Upload new image to public folder
            $profile->image = $imgPath; // Update profile image
        }

        $profile->save();

        return redirect('/profile');
    }
}
