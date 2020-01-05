@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
<div class="container">
    <form action="" method="post" class="form--post">
        <div class="form--post__item">
            <label for="caption" class="form--post__label">{{ __('caption') }}</label>
            <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

            <div class="form--post__error">
                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </form>
</div>
@endsection