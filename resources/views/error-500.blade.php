<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/error-500.css') }}" rel="stylesheet">
    <title>Карта безопасности</title>
</head>
<body>
<div class="wrapper">
    <header class="nav">
        <div class="container">
            <div class="logo">
                <a href="{{route('index')}}"><img src="../../public/images/logo.png"></a>
            </div>
            <nav class="nav-item">
                <a class="text" href="{{route('index')}}">Главная</a>&emsp;
                <a class="text" href="{{route('map')}}">Карта</a>&emsp;
                <a class="text" href="{{route('catalog')}}">Каталог</a>&emsp;
                <a class="text" href="{{route('resources')}}">Ресурсы</a>&emsp;
                <a class="text" href="{{route('about-us')}}">О &ensp;нас</a>&emsp;
                @if (Auth::check())
                    <button><a href="{{route('favourites')}}"><img src="../../public/images/favourit-icon.svg"></a></button>
                    <button><a href="{{route('account')}}"><img src="../../public/images/log-icon.svg"></a></button>
                    <button><a href="{{route('logout')}}"><img src="../../public/images/exit_icon.png"></a></button>
                @endif
                @if (!Auth::check())
                    <a class="text" href="{{route('login')}}">Вход</a>
                @endif
            </nav>
        </div>
    </header>
    <main>
        <div class="error">
            <div class="error-cont">
                <div class="error-img-cont-1">
                    <div class="error-img-1">
                        <img src="../../public/images/flower.png">
                    </div>
                    <div class="error-img-2">
                        <img src="../../public/images/flower.png">
                    </div>
                </div>
                <div class="texts">
                    <div class="error-text">
                        <p>5</p>
                        <img src="../../public/images/flower.png">
                        <p>0</p>
                    </div>
                    <div class="error-text2">
                        <p>Внутренняя ошибка сервера</p>
                    </div>
                    <div class="error-button">
                        <button><a href="{{route('index')}}">Вернуться на главную</a></button>
                    </div>
                </div>
                <div class="error-img-cont-2">
                    <div class="error-img-3">
                        <img src="../../public/images/flower.png">
                    </div>
                    <div class="error-img-4">
                        <img src="../../public/images/flower.png">
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
