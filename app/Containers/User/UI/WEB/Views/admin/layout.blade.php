<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Мій сайт')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('login') }}">Вхід</a></li>
                <li><a href="{{ route('register') }}">Реєстрація</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}">Панель</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Вийти</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© {{ date('Y') }} Мій сайт</p>
    </footer>
</body>
</html>
