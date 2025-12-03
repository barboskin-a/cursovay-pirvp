<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/registration.css') }}" rel="stylesheet">
    <title>Регистрация</title>
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
            <h2>Регистрация</h2>
{{--            для функционала регистрации в юзер контроллере--}}
            <form action= "{{route('registration')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Электронная почта" required>
                </div>
                @error('email')
                <p class="error-message">email должен содержать минимум 9 символов</p>
                @enderror
                <div class="form-group">
                    <input type="password" id="password" name="password"
                           placeholder="Пароль" required>
                </div>
                @error('password')
                <p class="error-message">Пароль должен содержать минимум 6 символов, включая цифры и латиницу</p>
                @enderror
                <div class="form-group">
                    <input type="password" id="password2" name="password2"
                           placeholder="Повторите пароль" required>
                </div>
                @error('password2')
                <p class="error-message">Пароли не совпадают</p>
                @enderror
                <div class="register-and-button">
                    <button type="submit">Зарегистрироваться</button>
                    <p>Уже есть аккаунт? <a href="{{route('login')}}">Войти</a></p>
                </div>
            </form>
        </section>
    </main>
</div>
</body>
</html>
