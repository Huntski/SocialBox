@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
<div class="container">
    <form action="/p" method="post" enctype="multipart/form-data" class="form--post">
        @csrf
        <div class="form--post__item">
            <label for="title" class="form--post__label">Caption</label>
            <input id="title" type="text" class="form--post__input @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

            <div class="form--post__error">
                @error('caption')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="form--post__item">
            <label for="image" class="form--post__label">add image</label>
            <input type="file" name="image" id="image" class="form--post__file">

            <div class="form--post__error">
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <button class="form--post__submit">Submit New Post</button>
    </form>
</div>
@endsection