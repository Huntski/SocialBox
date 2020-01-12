<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\File;

class ProfilesController extends Controller
{
    public function index($user = null)
    {
        if ($user == null) {
            $user = auth()->user();

            $inputs = [
                'title' => 'text',
                'description' => 'text',
                'image' => 'file',
                'banner' => 'file',
                'url' => 'text'
            ];
        } else {
            $inputs;
            $user = User::findOrFail($user);
        }

        return view('user.profile', [
            'user' => $user,
            'inputs' => $inputs,
        ]);
    }

    public function modify()
    {
        $profile = auth()->user()->profile;

        $data = request()->validate([
            'title' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:250'],
            'image' => ['nullable', 'image'],
            'banner' => ['nullable', 'image'],
            'url' => ['nullable', 'string', 'max:100'],
        ]);

        $profile->title = $data['title']; // Update profiles title
        $profile->description = $data['description']; // Update profiles description
        $profile->url = $data['url']; // Update profiles url

        if (request('image')) {
            $img_path = public_path("storage/{$profile->image}");
            if(File::exists($img_path)) { // Check if profile already has a image
                File::delete($img_path); // If it does remove old image
            }
            $img_path = request('image')->store('uploads', 'public'); // Upload new image to public folder
            $profile->image = $img_path; // Update profile image
        }

        if (request('banner')) {
            $image_path = public_path("storage/{$profile->banner}");
            if(File::exists($image_path)) { // Check if profile already has a image
                File::delete($image_path); // If it does remove old image
            }
            $imgPath = request('image')->store('banners', 'public'); // Upload new image to public folder
            $profile->image = $imgPath; // Update profile image
        }

        $profile->save();

        return redirect('/profile');
    }
}
