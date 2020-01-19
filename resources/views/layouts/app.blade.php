<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SocialBox</title>
    <link rel="icon" href="{{ asset('img/logo_white.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body>
    <main>
        @auth
        <div class="index">
            <div class="explore bold">
                <a class="explore__section flex align bold" href="/" style="margin-bottom: 50px">
                    <div class="explore__img logo"><img src="{{ asset('img/logo.png') }}" alt="Default img"></div>
                    SocialBox
                </a>
                <a class="explore__section flex align @if(\Request::route()->getName() == 'home') explore--active @endif" href="/">
                    <div class="explore__img avatar"></div>
                    Home
                </a>
                <a class="explore__section flex align @if(\Request::route()->getName() == 'profile.user') explore--active @endif" href="/profile">
                    <div class="explore__img avatar"><img src="{{ $user->profile->avatar() ?? '' }}" alt="Default img"></div>
                    Profile
                </a>
                <a class="explore__section flex align" onclick="logout()">
                    <div class="explore__img"></div>
                    Logout
                </a>
            </div>
            <div class="content">
                <div class="content__header">
                    @yield('content__header')
                </div>
                @yield('content')
            </div>
        </div>
        @else
            @yield('content')
        @endauth
    </main>

    @yield('modals')

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script type="text/javascript">
        function logout () {
            event.preventDefault()
            document.querySelector('#logout-form').submit()
        }

        function _modal (e_id) { // Class name of element requested to show
            console.log('-- Modal function --', `id: ${e_id}`)
            let e = document.getElementById(e_id)
            if (e.style.display == 'none' || e.style.display == '') {
                console.log('open')
                e.style.display = 'block'
                return
            }
            console.log('close')
            e.style.display = 'none'
        }
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
