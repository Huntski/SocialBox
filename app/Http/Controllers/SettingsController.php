<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $inputs = [
            'description' => 'text',
            'url' => 'text'
        ];

        return view('user.settings', [
            'user' => auth()->user(),
            'inputs' => $inputs,
        ]);
    }

    public function store()
    {
        $profile = auth()->user()->profile;

        $data = request()->validate([
            'banner' => ['nullable', 'image'],
            'avatar' => ['nullable', 'image'],
            'description' => ['nullable', 'string', 'max:250'],
            'url' => ['nullable', 'string', 'max:100'],
        ]);

        $profile->description = $data['description']; // Update profiles description
        $profile->url = $data['url']; // Update profiles url

        if (request('avatar')) {
            $img_path = public_path("storage/{$profile->avatar}");
            if($profile->avatar && Storage::exists($img_path)) { // Check if profile already has a avatar
                Storage::delete($img_path); // If it does remove old avatar
            }
            $img_path = request('avatar')->store('uploads', 'public'); // Upload new avatar to public folder
            $profile->avatar = $img_path; // Update profile avatar
        }

        if (request('banner')) {
            $img_path = public_path("storage/{$profile->banner}");
            if($profile->banner && Storage::exists($img_path)) { // Check if profile already has a banner
                Storage::delete($img_path); // If it does remove old banner
            }
            $img_path = request('banner')->store('banners', 'public'); // Upload new banner to public folder
            $profile->banner = $img_path; // Update profile banner
        }

        $profile->save();

        return redirect('/profile');
    }
}
