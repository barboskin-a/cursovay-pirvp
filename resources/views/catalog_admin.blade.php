<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/catalog_admin.css') }}" rel="stylesheet">
    <script src="{{ asset("js/modal.js") }}"></script>
    <title>Админ-панель</title>
</head>
<body>
<div class="wrapper">
    <header class="nav">
        <div class="container">
            <nav class="nav-item">
                <div class="nav_text">
                    <a class="text" href="{{route('catalog_admin')}}">Каталог</a>&emsp;
    {{--                <a class="text" href="{{route('/')}}">Заявки на метку</a>&emsp;--}}
                </div>
                <div class="nav_icon">
                    @if (Auth::check())
                        <button><a href="{{route('account')}}"><img src="../../public/images/log-icon.svg"></a></button>
                        <button><a href="{{route('logout')}}"><img src="../../public/images/exit_icon.png"></a></button>
                    @endif
                    @if (!Auth::check())
                        <a class="text" href="{{route('login')}}">Вход</a>
                    @endif
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="catalog-text">
            <div class="catalog-header-text">
                <span>Админ-панель каталога</span>
            </div>
            <div class="items">
                @csrf
                <button type="submit" class="items_add">Добавить новый товар</button>
            </div>
        </div>

        <div class="catalog-section">
            @foreach($products as $product)
                <section class="catalog">
                    <div class="catalog-main">
                        <div class="catalog-cards">
                            <article>
                                <div class="catalog-img-card">
                                    {{--                                <button onclick="openModal()">--}}
                                    <a href="{{ route('product_card', $product->id) }} "><img src="{{ $product->photo }}" alt="photo"></a>
                                    {{--                                </button>--}}
                                </div>
                                <div class="catalog-text-card">
                                    <div class="catalog-text-card-price">
                                        <p>{{ $product->name }}</p>
                                        <div class="items">
                                            <form method="post" action="{{ route('add_to_favourites',  $product->id) }}">
                                                @csrf
                                                <button type="submit">Изменить</button>
                                                <div class="delete">
                                                    <button class="items_delete" type="submit">Удалить</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
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
                    <a class="link" href="{{route('catalog_admin')}}">Каталог</a>
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
            </div>
        </div>
    </footer>
</div>
</body>
</html>
