@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="{{ asset('/css/guest.css') }}">

@endsection

@section('content')

@php

$inputs = [
    'email' => 'email',
    'username' => 'text',
    'password' => 'password'
];

@endphp

<form method="POST" action="{{ route('register') }}" class="form-guest">
    @csrf
    <h1 class="form-guest__title">Register to <span class="bold">SocialBox</span></h1>
    <img class="logo logo--mobile" src="{{ asset('img/logo.png') }}" alt="logo">
    @foreach ($inputs as $name => $type)
    <div class="form-guest__item input--style">
        <input id="{{ $name }}" type="{{ $type }}" class="form-guest__input input__input--style @error(" {$name}") is-invalid @enderror"
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

    <p class="form-guest__extra">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
    <button type="submit" class="form-guest__submit button--submit">register</button>
</form>

<img class="logo logo--desktop" src="{{ asset('img/logo.png') }}" alt="logo">

@endsection
