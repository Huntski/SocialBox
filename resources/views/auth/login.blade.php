@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(159deg, #ff6363 0%, #ff6363 50%, #e73f3f 50%, #e73f3f 100%);
        background-size: 190% 100%;
    }

    main {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        max-width: 1200px;
    }

    .logo {
        width: 130px;
    }

    .button--active {
        border: solid 1px #fff;
    }


    .vink {
        display: none;
    }

    #remember:checked ~ label .vink {
        display: block;
    }
</style>

@php

$form_contents = [
    'email',
    'password'
];

$form_contents_type = [
    'email' => 'email',
    'password' => 'password',
];

@endphp
<form method="POST" action="{{ route('login') }}" class="form--guest">
    @csrf
    <h1 class="form--guest__title bold">Welcome back to SocialBox</h1>
    <h2 class="form--guest__desc bold">Please login or create an account.</h2>
    @foreach ($form_contents as $item)
    <div class="form--guest__item">
        <label for="{{ $item }}" class="form--guest__label">{{ $item }}</label>
        <input id="{{ $item }}" type="{{ $form_contents_type[$item] }}" class="form--guest__input @error(" {$item}") is-invalid @enderror"
            name="{{ $item }}" value="{{ old("{$item}") }}" required autocomplete="off" autofocus>

        <div class="form--guest__error">
            @error("{$item}")
            <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>
    @endforeach
    <div class="form--guest__item flex align row" style="margin-left: 0">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="display: none">
        <label for="remember" class="checkbox--default">
            <div class="vink">
                <div></div>
                <div></div>
            </div>
        </label>
        Remember me
    </div>

    <p class="form--guest__extra">Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
    <button type="submit" class="button--active">login</button>
</form>

<img class="logo" src="{{ asset('img/logo_white.png') }}" alt="logo">

@endsection
