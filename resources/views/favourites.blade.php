<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/favourites.css') }}" rel="stylesheet">
    <title>Корзина</title>
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
        @csrf
        <section class="favourites">
            <div class="favourites-main">
                <div class="favourites-text">
                    <div class="favourites-header-text">
                        <h2>Корзина</h2>
                    </div>
                </div>
                <div class="favourites-container">
                    <div class="favourites-cards">
                        <article>
                            <div class="favourites-img-card">
                                <img src="../../public/images/product1.png" alt="photo">
                            </div>
                            <div class="favourites-text-card">
                                <div class="favourites-text-card-price">
                                    <p>Набор безопасности №1</p>
                                    <div class="product-price">
                                        <div>
                                            <span>Цвет:</span>
                                            <span class="circle1"></span>
                                        </div>
                                        <div class="items">
                                            <span>1990₽</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <button type="submit" class="quantity_btn quantity_btn_minus">-</button>
                                    <input type="text" class="quantity_input" placeholder="1">
                                    <button type="submit" class="quantity_btn quantity_btn_plus">+</button>
                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="favourites-img-card">
                                <img src="../../public/images/product2.png" alt="photo">
                            </div>
                            <div class="favourites-text-card">
                                <div class="favourites-text-card-price">
                                    <p>Набор безопасности №2</p>
                                    <div class="product-price">
                                        <div>
                                            <span>Цвет:</span>
                                            <span class="circle2"></span>
                                        </div>
                                        <div class="items">
                                            <span>1990₽</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <button type="submit" class="quantity_btn quantity_btn_minus">-</button>
                                    <input class="quantity_input" placeholder="1">
                                    <button type="submit" class="quantity_btn quantity_btn_plus">+</button>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="favourites-order">
                        <div class="favourites-price-sum">
                            <p><span>Итог</span> &emsp; 3980₽</p>
                        </div>
                        <div class="favourites-button">
                            <button><a class="button" href="order.php">Перейти к
                                    оформлению</a></button>
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
                    <a class="link" href="{{route('about_us')}}">О нас</a>
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
