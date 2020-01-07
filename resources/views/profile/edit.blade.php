@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="">
@endsection

@section('content')
<div class="container">
    <form action="/profile/edit" method="post" enctype="multipart/form-data" class="form--post">
        @csrf
        <h1 class="form--post__title">Profile</h1>
        <div class="form--post__item">
            <label for="title" class="form--post__label">title</label>
            <input id="title" type="text" class="form--post__input @error('title') is-invalid @enderror" name="title" value="{{ $user->profile->title ?? '' }}" autocomplete="title" autofocus>

            <div class="form--post__error">
                @error('title')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="form--post__item">
            <label for="description" class="form--post__label">description</label>
            <input id="description" type="text" class="form--post__input @error('description') is-invalid @enderror" name="description" value="{{ $user->profile->description ?? '' }}" autocomplete="description" autofocus>

            <div class="form--post__error">
                @error('description')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="form--post__item">
            <label for="image" class="form--post__label">avatar</label>
            <div class="flex--align--center">
                <div class="img-box" style="margin-right: 10px"><img src="{{ $user->profile->profileImage() ?? '' }}" alt=""></div>
                <input type="file" name="image" id="image" class="form--post__file">
            </div>
            <div class="form--post__error">
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="form--post__item">
            <label for="url" class="form--post__label">url</label>
            <input id="url" type="text" class="form--post__input @error('url') is-invalid @enderror" name="url" value="{{ $user->profile->url ?? '' }}" autocomplete="url" autofocus>

            <div class="form--post__error">
                @error('url')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <button class="form--post__submit">Submit New Post</button>
    </form>
</div>
@endsection