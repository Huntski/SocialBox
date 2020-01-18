@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="{{ asset('/css/guest.css') }}">

@endsection

@section('content')

@php

$inputs = [
    'email' => 'email',
    'password' => 'password'
];

@endphp
<form method="POST" action="{{ route('login') }}" class="form-guest">
    @csrf
    <h1 class="form-guest__title">Welcome back to SocialBox</h1>
    <h2 class="form-guest__desc">Please login or create an account.</h2>
    <img class="logo logo--mobile" src="{{ asset('img/logo.png') }}" alt="logo">
    @foreach ($inputs as $name => $type)
    <div class="form-guest__item input--style">
        <input id="{{ $name }}" type="{{ $type }}" class="form-guest__input input__input--style @if(old("{$name}")) input--active @endif @error(" {$name}") is-invalid @enderror"
            name="{{ $name }}" value="{{ old("{$name}") }}" required autocomplete="off" autofocus>
        <label for="{{ $name }}" class="form-guest__label input__label--style">
            <span class="input__span--style">{{ $name }}</span>
        </label>

        <div class="form-guest__error input__error--style">
            @error("{$name}")
            <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>
    @endforeach
    <div class="form-guest__item flex align row" style="margin-left: 0">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="display: none">
        <label for="remember" class="checkbox--default">
            <div class="vink">
                <div></div>
                <div></div>
            </div>
        </label>
        Remember me
    </div>

    <p class="form-guest__extra">Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
    <button type="submit" class="button--active">login</button>
</form>

<img class="logo logo--desktop" src="{{ asset('img/logo.png') }}" alt="logo">

@endsection
