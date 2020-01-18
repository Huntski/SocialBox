@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" method="post" enctype="multipart/form-data" class="form--post">
        @csrf
        <div class="form--post__item">
            <label for="caption" class="form--post__label">Caption</label>
            <input id="caption" type="text" class="form--post__input @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="captiont" autofocus>

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

        <button class="form-post__submit">Submit New Post</button>
    </form>
</div>
@endsection