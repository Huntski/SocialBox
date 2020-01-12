@extends('layouts.app')

@section('content')
    <form action="/post" method="post" enctype="multipart/form-data" class="form-post">
        @csrf
        <div class="form-post__input-box flex align">
            <div class="form-post__avatar avatar"><img src="{{ $user->profile->image() }}" alt="avatar"></div>
            <input id="caption" type="text" class="form-post__input regular" name="caption" placeholder="What's happening?">
            {{-- <div class="form-post__error">
                @error('caption')
                    <strong>{{ $message }}</strong>s
                @enderror
            </div> --}}
        </div>

        <div class="form-post__extras">
            <input type="file" name="image" id="image" class="form-post__file" style="display: none">

            <div class="form-post__error">
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <button class="form-post__submit">Post</button>
    </form>
    @foreach ($posts as $post)
        <div class="post">
            <div class="post__user flex align">
                <a href="/profile/"></a>
                <div class="avatar"><img src="{{ $post->avatar }}" alt="{{ $post->avatar }}"></div>
                <h1 class="post__name bold">{{ $post->username }}</h1>
                <span class="post__date regular">{{ $post->date }}</span>
            </div>
            <p class="post__caption">{{ $post->caption }}</p>
            @if($post->image)
                <div class="post__image"><img src="{{ $post->image }}" alt="{{ explode('uploads/', $post->image)[1] }}"></div>
            @endif
        </div>
    @endforeach
@endsection