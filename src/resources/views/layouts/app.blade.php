<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    @yield('css')
    <title>Contact Form</title>
</head>

<body>
    <header class="header">
        <div class="header__title">
            <h1>FashionablyLate</h1>
        </div>
        <div class="header__right">
            @yield('header')
            @auth
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">logout</button>
            </form>
            @endauth
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    @yield('js')
</body>
</html>