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

    .form--guest__title {
        margin-bottom: 20px;
    }
</style>

<form method="POST" action="{{ route('register') }}" class="form--guest">
    @csrf
    <h1 class="form--guest__title bold">Register</h1>

    <div class="form--guest__item">
        <label for="email" class="form--guest__label">email</label>
        <input id="email" type="email" class="form--guest__input @error('email') is-invalid @enderror"
            name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

        <div class="form--guest__error">
            @error('email')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form--guest__item">
        <label for="username" class="form--guest__label">username</label>
        <input id="username" type="text" class="form--guest__input @error('username') is-invalid @enderror"
            name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>

        <div class="form--guest__error">
            @error('username')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form--guest__item">
        <label for="name" class="form--guest__label">name</label>
        <input id="name" type="text" class="form--guest__input @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

        <div class="form--guest__error">
            @error('name')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form--guest__item">
        <label for="password" class="form--guest__label">password</label>
        <input id="password" type="password" class="form--guest__input @error('password') is-invalid @enderror"
            name="password" value="{{ old('password') }}" required autocomplete="off" autofocus>

        <div class="form--guest__error">
            @error('password')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <p class="form--guest__extra">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
    <button type="submit" class="button--active">register</button>
</form>

<img class="logo" src="{{ asset('img/logo_white.png') }}" alt="logo">

@endsection
