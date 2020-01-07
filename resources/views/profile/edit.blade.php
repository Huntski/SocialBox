@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="">
@endsection

@section('content')
<div class="container">
    <form action="/profile/edit" method="post" enctype="multipart/form-data" class="form--post">
        @csrf
        <div class="form--post__item">
            <label for="caption" class="form--post__label">Your tweet</label>
            <input id="caption" type="text" class="form--post__input @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

            <div class="form--post__error">
                @error('caption')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="form--post__item">
            <label for="image" class="form--post__label">Post Image</label>
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