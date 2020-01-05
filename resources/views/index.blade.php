@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="home">
    @auth
    <div class="user">
        <a class="user__section" href="">
            <div class="user__img img-box"><img src="{{ asset('img/default.png') }}" alt="Default img"></div>
            {{ Auth::user()->username }}
        </a>
        <a class="user__section" href="{{ route('logout') }}" onclick="logout()">
            <div class="user__img"></div>
            Logout
        </a>
    </div>
    @endauth
    <div class="tweets">
        <div class="tweet">
            <div></div>
        </div>
    </div>
</div>
@endsection