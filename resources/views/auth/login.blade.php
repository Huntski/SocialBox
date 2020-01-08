@extends('layouts.app')

@section('content')
@php

$form_contents = [
    'email',
    'password'
];

@endphp
<form method="POST" action="{{ route('login') }}" class="form--guest">
    <h1 class="form--guest__title">Sign up</h1>
    @csrf
    @foreach ($form_contents as $item)
        <div class="form--guest__item">
            <label for="{{ $item }}" class="form--guest__label">{{ $item }}</label>
            <input id="{{ $item }}" type="text" class="form--guest__input @error("{$item}") is-invalid @enderror" name="{{ $item }}" value="{{ old("{$item}") }}" required autocomplete="{{ $item }}" autofocus>

            <div class="form--guest__error">
                @error("{$item}")
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>
    @endforeach
</form>
@endsection