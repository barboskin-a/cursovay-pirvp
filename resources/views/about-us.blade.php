<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/about-us.css') }}" rel="stylesheet">
    <title>О нас</title>
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
            </nav>
        </div>
    </header>
    <main>
        <section class="about-us">
            <div class="about-us-head">
                <p>О нас</p>
                <div class="about-us-main">
                    <div class="about-us-main-img">
                        <img src="../../public/images/woman-fly.png">
                    </div>
                    <div class="about-us-main-text">
                        <div class="about-us-text">
                            <div class="texts">
                                <p><span>Наша цель - </span> &ensp;создать сообщество взаимной
                                    помощи и поддержки, где
                                    каждая женщина будет
                                    чувствовать себя защищенной!</p><br>
                            </div>
                            <div class="about-us-text-p">
                                <p>В мире, где безопасность и комфорт часто ставят под сомнение, мы
                                    стремимся создать
                                    платформу, которая помогает женщинам находить безопасные места,
                                    получать информацию
                                    и делиться опытом.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="block">
                    <div class="about-us-community">
                        <div class="about-us-community-text">
                            <div class="about-us-main-text-all">
                                <span>Присоединяйся к нашему сообществу</span>
                                <p>Ваш голос имеет значение, и вместе мы можем<br>сделать мир
                                    безопаснее.</p>
                            </div>
                            <img src="../../public/images/leaf.png">
                        </div>
                        <div class="qr">
                            <img src="../../public/images/QR.png">
                        </div>
                        <div class="cont-img">
                            <div class="blok-img-butterfly">
                                <img src="../../public/images/butterfly.png">
                            </div>
                            <div class="about-us-img-leaf">
                                <div class="img-bottom-leaf">
                                    <img src="../../public/images/leaf%20and%20fly%20about-us.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                    <a class="text" href="{{route('index')}}">Главная</a>
                    <a class="text" href="{{route('map')}}">Карта</a>
                    <a class="text" href="{{route('catalog')}}">Каталог</a>
                    <a class="text" href="{{route('resources')}}">Ресурсы</a>
                    <a class="text" href="{{route('about-us')}}">О нас</a>
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
                    <a href="https://t.me/woman_safe">Добавить место</a>
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
