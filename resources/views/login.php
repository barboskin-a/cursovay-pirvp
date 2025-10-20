<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
    <title>Вход</title>
</head>
<body>
<div class="wrapper">
    <main>
        <section class="forms">
            <h2>Вход</h2>
            <form method="post">
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Электронная
почта" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password"
                           placeholder="Пароль" required>
                </div>
                <div class="login-and-button">
                    <button type="submit">Войти</button>
                    <p>Еще нет аккаунта? <a
                            href="registration.php">Зарегистрироваться</a></p>
                </div>
            </form>
        </section>
    </main>
</div>
</body>
</html>

<?php
