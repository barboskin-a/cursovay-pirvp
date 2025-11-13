<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Woman Safe</title>
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
                @if (Auth::check())
                    <button><a href="{{route('favourites')}}"><img src="../../public/images/favourit-icon.svg"></a></button>
                    <button><a href="{{route('account')}}"><img src="../../public/images/log-icon.svg"></a></button>
                    <button><a href="{{route('logout')}}"><img src="../../public/images/exit_icon.png"></a></button>
                @endif
                @if (!Auth::check())
                    <button type="button"><a class="text" href="{{route('login')}}">Вход</a></button>
                @endif
            </nav>
        </div>
    </header>
    <main>
        <section class="preview">
            <img src="../../public/images/preview.png">
            <button><img src="../../public/images/message_icon.png">Вступить в коммьюнити</button>
        </section>
        <section class="map">
            <div class="map-main">
                <div class="interactive-map">
                    <img src="../../public/images/butterfly.png">
                    <script type="text/javascript" charset="utf-8" async
                            src="https://apimaps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A473d2b64f2a91950e979354456
c3faf6a5141dd5d5662fe0940f4de511ea7b3c&amp;width=534&amp;height=316&amp;lang=ru_
RU&amp;scroll=true"></script>
                </div>
                <div class="map-text">
                    <div class="map-text-1">
                        <p><span class="general-red-text">Карта безопасных мест для женщин -
</span> интерактивный ресурс, который поможет вам находить безопасные места для
                            прогулок.</p>
                    </div>
                    <div class="map-text-2">
                        <p>Переходите на карту прямо сейчас и начинай исследовать безопасные
                            маршруты в вашем
                            районе.
                            Вместе
                            мы сможем сделать большой шаг к справедливому и равному
                            обществу!</p>
                        <div class="map-button">
                            <img src="../../public/images/butterfly.png">
                            <button type="button"><a href="{{route('map')}}">Карта
                                    безопасности</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="catalog">
            <div class="catalog-main">
                <div class="catalog-text">
                    <div class="catalog-header-text">
                        <span>Каталог</span>
                        <p>Обеспечьте безопасность себе и своим близким <br>с помощью
                            наших наборов брелоков</p>
                    </div>
                </div>
                <div class="catalog-section">
                    @foreach($products as $product)
                        <section class="catalog">
                            <div class="catalog-main">
                                <div class="catalog-cards">
                                    <article>
                                        <div class="catalog-img-card">
                                            <img src="{{ $product->photo }}" alt="photo">
                                        </div>
                                        <div class="catalog-text-card">
                                            <div class="catalog-text-card-price">
                                                <p>{{ $product->name }}</p>
                                                <div class="product-price">
                                                    <div>
                                                        <span>Цвет:</span>
                                                        <span class="circle" style="background-color: {{ $product->color }};"></span>
                                                    </div>
                                                    <div class="items">
                                                        <div>
                                                            <span>{{ $product->price }}</span>
                                                            {{--                                            <p>999₽</p>--}}
                                                        </div>
                                                        <button type="submit"><img src="../../public/images/favourit-icon.svg"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="resourse">
            <div class="res-cont">
                <div class="res-title">
                    <h2>Ресурсы для женщин</h2>
                </div>
                <div class="resourse-contein">
                    <div class="container-for-resourse">
                        <div class="container-for-text-r">
                            <div class="cont">
                                <div class="text-g">
                                    <p><span>Мы понимаем, </span>что женщины нуждаются в
                                        особой поддержке. Именно поэтому создан этот раздел, чтобы помочь вам найти ресурсы
                                        для обеспечения безопасности.</p>
                                </div>
                                <div class="text-s"><p>Здесь вы сможете найти информацию о
                                        кризисных центрах и номера горячих линий служб поддержки.</p></div>
                            </div>
                            <div class="button-r"><button><a class="button"
                                                             href="{{route('resources')}}">Подробнее</a></button></div>
                        </div>
                        <div class="resourse-main-img"> <img src="../../public/images/woman-leaves.png"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-us">
            <div class="about-us-head">
                <p>О нас</p>
                <div class="about-us-main">
                    <div class="about-us-main-img">
                        <img src="../../public/images/woman-fly.png">
                    </div>
                    <div class="about-us-main-text">
                        <div class="about-us-text">
                            <div>
                                <p><span>Наша цель - </span> &ensp;создать сообщество взаимной
                                    помощи и поддержки, где каждая женщина будет
                                    чувствовать себя защищенной!</p><br>
                            </div>
                            <div class="about-us-text-p">
                                <p>На нашем сайте вы сможете:<br>
                                    - Просматривать локации, отмеченные как безопасные для
                                    женщин<br>
                                    - Заказать брелки безопасности<br>
                                    - Найти информацию о кризисных центрах,<br> горячих линиях
                                    поддержки и другие важные ресурсы, помогающие женщинам в сложных ситуациях</p>
                            </div>
                        </div>
                        <div class="button-a"><button><a href="{{route('about-us')}}">Подробнее</a></button></div>
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

ПРОДОЛЖЕНИЕ ПРИЛОЖЕНИЯ А
89
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
