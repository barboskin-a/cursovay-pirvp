<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <title>Вход</title>
</head>
<body>
<div class="wrapper">
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
