@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="home">
    <div class="user">
        <a class="user__section" href="">
            <div class="user__img img-box"><img src="{{ asset('img/default.png') }}" alt="Default img"></div>
            {{ Auth::user()->username }}
        </a>
        <a class="user__section" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="user__img"></div>
            Logout
        </a>
    </div>
    <div class="tweets"></div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection