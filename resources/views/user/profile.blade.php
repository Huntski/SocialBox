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
        <div class="profile__avatar avatar"><img src="{{ $user->profile->avatar() }}" alt="Profile Image"></div>
        <div class="profile__info">
            <h1 class="profile__name bold">{{ $user->username }}</h1>
            <h2 class="profile__title">{{ $user->profile->title }}</h2>
            <p class="profile__description">{{ $user->profile->description }}</p>
            @if($user->id == auth()->user()->id)
                <button class="profile__edit button--border--round" onclick="_modal('edit-form')">Edit profile</button>
            @else
                <button class="profile__follow button--border--round">Follow</button>
            @endif
        </div>
    </div>

    <div class="posts"></div>
        @if ($user->posts->count())
            @foreach ( $user->posts as $post)
                <div class="post">
                    <div class="post__user flex align">
                        <div class="avatar"><img src="{{ $user->profile->avatar() }}" alt="{{ $user->profile->avatar() }}"></div>
                        <span class="post__name bold">{{ $user->username }}</span>
                    </div>
                    <p class="post__caption">{{ $post->caption }}</p>
                    @if($post->image)
                        <div class="post__image"><img src="{{ $post->avatar() }}" alt="{{ $post->caption }}"></div>
                    @endif
                </div>
            @endforeach
        @else
            <h1 class="post__none">This user has no posts.</h1>
        @endif
    </div>
@endsection

@section('modals')
    @if($user->id == auth()->user()->id)
    <div class="modal" id="edit-form">
        <div class="modal__filter" onclick="_modal('edit-form')"></div>

        <form action="/profile/edit" method="post" enctype="multipart/form-data" class="form-modal">
            <div class="form-modal__header">
                <button class="form-modal__close cross cross--exit" type="button" onclick="_modal('edit-form')">
                    <div></div>
                    <div></div>
                </button>
                <h1 class="form-modal__title bold">Edit profile</h1>
                <button class="form-modal__submit button--submit">save</button>
            </div>
            @csrf
            @foreach($inputs as $name => $type)
                <div class="form-modal__item input--large file">
                    <label for="title" class="input__label--large"><span class="input__name--large">{{ $name }}</span></label>
                    <input id="{{ $name }}" type="{{ $type }}" class="input__input--large @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ $user->profile->{$name} ?? '' }}" autocomplete="{{ $name }}" autofocus>

                    <div class="input__error--large">
                        @error($name)
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            @endforeach
        </form>
    </div>
    @endif
@endsection