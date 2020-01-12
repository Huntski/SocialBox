@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="posts">
        <div class="posts__header">
            <div class="profile__banner"><img src="{{ $user->profile->banner() }}" alt="Profile Banner"></div>
            <div class="profile__avatar avatar"><img src="{{ $user->profile->image() }}" alt="Profile Image"></div>
            <div class="profile__info">
                <h1 class="profile__name bold">{{ $user->username }}</h1>
                <h2 class="profile__title">{{ $user->profile->title }}</h2>
                <p class="profile__description">{{ $user->profile->description }}</p>
                @if($user->user_id == auth()->user()->user_id)
                    <button href="/profile/edit" class="button--link" onclick="_modal('edit-form')">Edit profile</button>
                @endif
            </div>
        </div>
        @foreach ( $user->posts as $post)
            <div class="post">
                <div class="post__user flex align">
                    <div class="avatar"><img src="{{ $user->profile->image() }}" alt="{{ $user->profile->image() }}"></div>
                    <span class="post__name bold">{{ $user->username }}</span>
                </div>
                <p class="post__caption">{{ $post->caption }}</p>
                @if($post->image)
                    <div class="post__image"><img src="{{ $post->image() }}" alt="{{ $post->caption }}"></div>
                @endif
            </div>
        @endforeach
    </div>

    @if($user->user_id == auth()->user()->user_id)
        <div class="modal" id="edit-form">
            <div class="modal__leave"></div>
            <form action="/profile/edit" method="post" enctype="multipart/form-data" class="form-modal">
                @csrf
                <div class="form-modal__header">
                    <button class="form-modal__close cross cross--exit">
                        <div></div>
                        <div></div>
                    </button>
                    <h1 class="form-modal__title bold">Edit profile</h1>
                </div>
                <div class="form-modal__content">
                    @foreach($inputs as $name => $type)
                        <div class="form-modal__item">
                            <label for="title" class="form-modal__label">{{ $name }}</label>
                            <input id="{{$name}}" type="{{$type}}" class="form-modal__input @error($name) is-invalid @enderror" name="{{$name}}" value="{{ $user->profile->{$name} ?? '' }}" autocomplete="{{$name}}" autofocus>

                            <div class="form-modal__error">
                                @error($name)
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                    <button class="form-post__submit">Update profile</button>
                </div>
            </form>
        </div>
    @endif
@endsection