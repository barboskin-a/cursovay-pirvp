<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <title>Вход</title>
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
                <a class="text" href="{{route('about_us')}}">О &ensp;нас</a>&emsp;
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
        <section class="forms">
            <h2>Вход</h2>
            <form method="post">
                @csrf
                @error("email")
                <p class="error-message">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Электронная почта" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password"
                           placeholder="Пароль" required>
                </div>
                <div class="login-and-button">
                    <button type="submit">Войти</button>
                    <p>Еще нет аккаунта? <a
                                href="{{route('registration')}}">Зарегистрироваться</a></p>
                </div>
            </form>
        </section>
    </main>
</div>
</body>
</html>
