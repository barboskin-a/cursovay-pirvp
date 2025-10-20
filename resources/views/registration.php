<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/registration.css">
    <title>Регистрация</title>
</head>
<body>
<div class="wrapper">
    <main>
        <section class="forms">
            <h2>Регистрация</h2>
            <form method="post">
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Электронная
почта" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password"
                           placeholder="Пароль" required>
                </div>
                <div class="form-group">
                    <input type="password" id="repeat-password" name="repeat-password"
                           placeholder="Повторите пароль" required>
                </div>
                <div class="register-and-button">
                    <button type="submit">Зарегистрироваться</button>
                    <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
                </div>
            </form>
        </section>
    </main>
</div>
</body>
</html>

<?php
