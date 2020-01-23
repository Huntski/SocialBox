@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content__header')
    <h1 class="content__title">Profile</h1>
@endsection

@section('content')
    <div class="profile">
        <div class="profile__banner"><img src="{{ $user->profile->banner() }}" alt=""></div>
        <div class="profile__avatar avatar"><img src="{{ $user->profile->avatar() }}" alt=""></div>
        <div class="profile__info">
            <h1 class="profile__name bold">{{ $user->username }}</h1>
            <h2 class="profile__title">{{ $user->profile->title }}</h2>
            <p class="profile__description">{{ $user->profile->description }}</p>
            @if($user->id != auth()->user()->id)
                <button class="profile__follow button--border--round">Follow</button>
            @endif
        </div>
    </div>

    <div class="posts"></div>
        @if (count($posts))
            @foreach ($posts as $post)
                <div class="post">
                    <div class="post__user flex align">
                        <div class="avatar"><img src="{{ $user->profile->avatar() }}" alt=""></div>
                        <span class="post__name bold">{{ $user->username }}</span>
                        <span class="post__date regular">{{ $post->date }}</span>
                    </div>
                    <p class="post__caption">{{ $post->caption }}</p>
                    @if($post->image)
                        <div class="post__image"><img src="{{ $post->avatar() }}" alt=""></div>
                    @endif
                </div>
            @endforeach
        @else
            <h1 class="post__none">This user has no posts.</h1>
        @endif
    </div>
@endsection