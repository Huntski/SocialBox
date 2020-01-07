@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile flex">
    <div class="profile__user flex align top">
        <div class="profile__avatar avatar"><img src="{{ $user->profile->image() }}" alt="Default img"></div>
        <div class="profile__info">
            <h2 class="profile__name bold">{{ $user->username }}</h2>
            <h3 class="profile__title">{{ $user->profile->title }}</h3>
            <h4 class="profile__description">{{ $user->profile->description }}</h4>
            @if($user->user_id == auth()->user()->user_id)
                <a href="/profile/edit">Edit profile</a>
            @endif
        </div>
    </div>
    <div class="posts">
        @foreach ( $user->posts as $post)
            <div class="post">
                <div class="post__user flex align">
                    <div class="avatar"><img src="{{ $user->profile->image() }}" alt="{{ $user->profile->image() }}"></div>
                    <h2 class="post__name bold">{{ $user->username }}</h2>
                </div>
                <p>{{ $post->caption }}</p>
                @if($post->image)
                    <div class="img-box"><img src="{{ $post->image() }}" alt="{{ $post->caption }}"></div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection