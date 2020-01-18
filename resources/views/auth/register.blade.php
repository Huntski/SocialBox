@extends('layouts.app')

@section('content')

<style>
    body {
        /* background: linear-gradient(159deg, #fff 0%, #fff 50%, #e73f3f 50%, #e73f3f 100%) !important; */
        /* background-size: 190% 100%; */
    }

    main {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        max-width: 1200px;
    }yj

    .logo {
        width: 130px;
    }

    .button--active {
        /* border: solid 1px #000; */
    }

    .vink {
        display: none;
    }

    #remember:checked ~ label .vink {
        display: block;
    }
</style>

@php

$inputs = [
    'email' => 'email',
    'username' => 'text',
    'password' => 'password'
];

@endphp

<form method="POST" action="{{ route('register') }}" class="form-guest">
    @csrf
    <h1 class="form-guest__title bold">Register</h1>

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
    <button type="submit" class="button--active">register</button>
</form>

<img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">

@endsection
