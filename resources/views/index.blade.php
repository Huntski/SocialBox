@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="home">
    <div class="user">
        <a class="user__section" href="/profile">
            <div class="user__img avatar"><img src="{{ $user->profile->image() }}" alt="Default img"></div>
            Profile {{-- {{ Auth::user()->username }} --}}
        </a>
        <a class="user__section" href="{{ route('logout') }}" onclick="logout()">
            <div class="user__img"></div>
            Logout
        </a>
    </div>

    <div class="posts">
        @foreach ($posts as $post)
        <div class="post">
            <div class="post__user flex align">
                <a href="/profile/"></a>
                <div class="avatar"><img src="{{ $post->avatar }}" alt="{{ $post->avatar }}"></div>
                <h4 class="post__name bold">{{ $post->username }}</h4>
                <h4 class="post__date regular">{{ $post->date }}</h4>
            </div>
            <p class="post__caption">{{ $post->caption }}</p>
            @if($post->image)
                <div class="post__image"><img src="{{ $post->image }}" alt="{{ explode('uploads/', $post->image)[0] }}"></div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection