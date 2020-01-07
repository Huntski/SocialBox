@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile">
    <div class="user">
        <div class="user__avatar img-box"><img src="{{ $user->profile->profileImage() }}" alt="Default img"></div>
        <div class="user_info">
            <h2 class="user__name">{{ $user->username }}</h2>
            <h3 class="user__title">{{ $user->profile->title }}</h3>
            <h4 class="user__description">{{ $user->profile->description }}</h4>
        </div>
        @if($user->user_id == auth()->user()->user_id)
        <a href="/profile/edit">Edit profile</a>
        @endif
    </div>
    <div class="tweets"></div>
</div>
@endsection