<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/registration.css') }}" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
<div class="wrapper">
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
                <p class="error-message">Пароль должен содержать минимум 6 символов, включая цифры</p>
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
