<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/favourites.css">
    <title>Корзина</title>
</head>
<body>
<div class="wrapper">
    <header class="nav">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="img/logo.png"></a>
            </div>
            <nav class="nav-item">
                <a class="text" href="index.html">Главная</a>&emsp;
                <a class="text" href="map.html">Карта</a>&emsp;
                <a class="text" href="catalog.html">Каталог</a>&emsp;
                <a class="text" href="resources.html">Ресурсы</a>&emsp;
                <a class="text" href="about-us.html">О &ensp;нас</a>&emsp;
                <button><a href="favourites.html"><img src="img/favourit-icon.svg"></a></button>
                <button><a href="registration.html"><img src="img/log-icon.svg"></a></button>
            </nav>
        </div>
    </header>
    <main>
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
                                <img src="img/product1.png" alt="photo">
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
                            </div>
                        </article>
                        <article>
                            <div class="favourites-img-card">
                                <img src="img/product2.png" alt="photo">
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
                            </div>
                        </article>
                    </div>
                    <div class="favourites-order">
                        <div class="favourites-price-sum">
                            <p><span>Итог</span> &emsp; 3980₽</p>
                        </div>
                        <div class="favourites-button">
                            <button><a class="button" href="order.html">Перейти к
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
                    <img src="img/logo.png">
                    <p>Сайт проекта “WS”. Все права защищены ©</p>
                </div>
                <div class="footer-nav">
                    <h3>Навигация</h3>
                    <a class="link" href="index.html">Главная</a>
                    <a class="link" href="map.html">Карта</a>
                    <a class="link" href="catalog.html">Каталог</a>
                    <a class="link" href="resources.html">Ресурсы</a>
                    <a class="link" href="about-us.html">О нас</a>
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
                    <a href="map.html">Карта безопасных мест</a>
                    <a href="">Добавить место</a>
                    <div class="footer-icon">
                        <a href="https://t.me/woman_safe"><img src="img/tg-icon.png"></a>
                        <a href="http://vk.com/woman_safe"><img src="img/vk-icon.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

<?php
