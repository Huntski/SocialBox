<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SocialBox</title>
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
</head>

<body>
    <main>
        <div class="welcome">
            <img class="logo logo--mobile" src="{{ asset('img/logo.png') }}" alt="logo">
            <h1 class="welcome__header">Welcome to <br><span class="header__span">SocialBox</span></h1>
            <p class="welcome__desc">SocialBox is an microblogging and social networking service on which users post and interact with
                messages. After registering, users can post, comment and like others posts.</p>
            <a href="/login"><button class="button--submit">Login / Register</button></a>
        </div>
    </main>
    <img class="logo logo--desktop" src="{{ asset('img/logo.png') }}" alt="logo">
</body>
</html>
