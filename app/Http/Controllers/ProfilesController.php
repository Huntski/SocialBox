<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('view', [
            'user' => $user,
        ]);
    }

    public function inspect($user)
    {
        $user = User::findOrFail($user);

        return view('view', [
            'user' => $user,
        ]);
    }

    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit');
    }

    public function modify()
    {
        $data = request();
    }
}
