@extends('layouts.app')

@section('content__header')
    <h1 class="content__title">Edit profile</h1>
@endsection

@section('content')

<div class="settings">
    <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data" class="form-settings">
        @csrf

        <div class="form-settings__banner">
            <input type="file" id="banner" name="banner" class="form-settings__banner__input">
            <label for="banner" class="form-settings__label-camera">
                <img src="{{ asset('img/camera.png') }}" alt="" class="form-settings__label-camera__img">
            </label>
            <img class="form-settings__banner__img" src="{{ $user->profile->banner() ?? '' }}" alt="">
        </div>

        <div class="form-settings__avatar">
            <input type="file" id="avatar" name="avatar" class="form-settings__avatar__input">
            <label for="banner" class="form-settings__label-camera">
                <img src="{{ asset('img/camera.png') }}" alt="" class="form-settings__label-camera__img">
            </label>
            <img src="{{ $user->profile->avatar() ?? '' }}" alt="Profile avatar" class="form-settings__avatar__img">
        </div>

        @foreach($inputs as $name => $type)
            <div class="form-settings__item input--large">
                <label for="title" class="input__label--large"><span class="input__name--large">{{ $name }}</span></label>
                <input id="{{ $name }}" type="{{ $type }}" class="input__input--large @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ $user->profile->{$name} ?? '' }}" autocomplete="{{ $name }}" autofocus>

                <div class="input__error--large">
                    @error($name)
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        @endforeach

        <button class="form-settings__submit button--submit">save</button>
    </form>
</div>

@endsection