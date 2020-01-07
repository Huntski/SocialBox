@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="home">
    @auth
    <div class="user">
        <a class="user__section" href="/profile">
            <div class="user__img img-box"><img src="{{ $user->profile->profileImage() }}" alt="Default img"></div>
            Profile {{-- {{ Auth::user()->username }} --}}
        </a>
        <a class="user__section" href="{{ route('logout') }}" onclick="logout()">
            <div class="user__img"></div>
            Logout
        </a>
    </div>
    @endauth
    <div class="posts">
        @foreach ($posts as $post)
        <div class="post">
            <div class="post__user">
                <div class="user__img"></div>
                <h2 class="user__name"></h2>
            </div>
            <div class="post__contents"></div>
            {{ $post->caption }}
        </div>
        @endforeach
    </div>
</div>
@endsection