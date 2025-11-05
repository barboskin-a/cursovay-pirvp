<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
    <title>Личный кабинет</title>
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
                <button><a href="{{route('favourites')}}"><img src="../../public/images/favourit-icon.svg"></a></button>
                <button><a href="{{route('registration')}}"><img src="../../public/images/log-icon.svg"></a></button>
                <button><a href="{{route('login')}}"><img src="../../public/images/exit_icon.png"></a></button>
            </nav>
        </div>
    </header>
    <main>
        <section class="personal-account">
            <div class="account-header-text">
                <h2>Личный кабинет</h2>
            </div>

            <div class="account">
                <div class="account-form">
                    <form action="{{ route('account.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <p>Изменить личные данные</p>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Электронная почта</label>
                            <input type="text" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="password">Новый пароль</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Подтвердите новый пароль</label>
                            <input type="password" id="confirm_password" name="confirm_password">
                        </div>
                        <button type="submit">Сохранить изменения</button>
                    </form>
                    <form action="{{ route('account.delete') }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить аккаунт?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить аккаунт</button>
                    </form>
                </div>
                <div class="account-img">
                    <img src="../../public/images/woman-fly.png">
                </div>
            </div>
            <div class="block">
                <div class="community">
                    <div class="community-text">
                        <div class="main-text-all">
                            <span>Присоединяйся к нашему сообществу</span>
                            <p>Ваш голос имеет значение, и вместе мы можем<br>сделать мир
                                безопаснее.</p>
                        </div>
                        <img src="../../public/images/leaf.png">
                    </div>
                    <div class="qr">
                        <img src="../../public/images/QR.png">
                    </div>
                    <div class="cont-bat">
                        <div class="blok-img-butterfly">
                            <img src="../../public/images/butterfly.png">
                        </div>
                        <div class="img-leaf">
                            <div class="img-bottom-leaf">
                                <img src="../../public/images/leaf%20and%20fly%20about-us.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-info">
                <div class="footer-logo">
                    <img src="../../public/images/logo.png">
                    <p>Сайт проекта “WS”. Все права защищены ©</p>
                </div>
                <div class="footer-nav">
                    <h3>Навигация</h3>
                    <a class="link" href="{{route('index')}}">Главная</a>
                    <a class="link" href="{{route('map')}}">Карта</a>
                    <a class="link" href="{{route('catalog')}}">Каталог</a>
                    <a class="link" href="{{route('resources')}}">Ресурсы</a>
                    <a class="link" href="{{route('about-us')}}">О нас</a>
                </div>
                <div class="footer-project">
                    <h3>О проекте</h3>
                    <a href="https://behappynn.ru/docs/%D0%91%D0%B8%D0%A5%D1%8D%D0%BF%D0%BF%D0%B8%20%D0%9F
%D0%9E%D0%9B%D0%98%D0%A2%D0%98%D0%9A%D0%90%20%D0%9A%D0%9E%
D0%9D%D0%A4%D0%98%D0%94%D0%95%D0%9D%D0%A6%D0%98%D0%90%D0%9
B%D0%AC%D0%9D%D0%9E%D0%A1%D0%A2%D0%98.pdf">Политика
                        конфиденциальности</a>
                    <a href="https://vrbank.ru/docs/7.pdf">Договор оферты</a>
                    <a href="https://t.me/woman_safe">Обратная связь</a>
                </div>
                <div class="footer-map">
                    <h3>Карта безопасности</h3>
                    <a href="{{route('map')}}">Карта безопасных мест</a>
                    <a href="">Добавить место</a>
                    <div class="footer-icon">
                        <a href="https://t.me/woman_safe"><img src="../../public/images/tg-icon.png"></a>
                        <a href="http://vk.com/woman_safe"><img src="../../public/images/vk-icon.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
