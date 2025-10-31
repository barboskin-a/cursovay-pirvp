<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/catalog.css') }}" rel="stylesheet">
    <title>Каталог</title>
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
{{--        @foreach($products as @product)--}}
{{--            @if (@product->type == "filter")--}}
        <section class="catalog">
            <div class="catalog-main">
                <div class="catalog-text">
                    <div class="catalog-header-text">
                        <span>Каталог</span>
                        <p>Обеспечьте безопасность себе и своим близким <br>с помощью наших
                            наборов брелоков</p>
                    </div>
                </div>
                @foreach ($products as $product)

                    @if ($product->type == "filter")
                        <div class="card">
                            <div><img src="images/products/{{ $product->shortName }}.png" alt="{{ $product->shortName }}" width="200" class="product"></div>
                            <div class="secondBlock">
                                <div class="information">
                                    <form method="POST" action="{{route('update-product', $product->id)}}">
                                        @csrf
                                        <label for="full_name">Название:</label>
                                        <input value="{{ $product->full_name }}" type="text" id="full_name" name="full_name" class="inputLine" required>
                                        <br>
                                        <label for="shortName">Короткое название (для фото):</label>
                                        <input value="{{ $product->shortName }}"  type="text" id="shortName" name="shortName" class="inputLine" required>
                                        <br>
                                        <label for="price">Цена:</label>
                                        <input value="{{ $product->price }}" type="number" id="price" name="price" class="inputLine" required>
                                        <br>
                                        <label for="max_value">Максимальный объем аквариума:</label>
                                        <input value="{{ $product->max_value }}" type="number" id="max_value" name="max_value" class="inputLine" required>
                                        <br>
                                        <label for="type-select">Тип продукта:</label>
                                        <select name="type" id="type-select">
                                            <option value="filter">Фильтр</option>
                                            <option selected value="light">Освещение</option>
                                            <option value="fish-tank">Аквариум</option>
                                            <option value="wood">Дерево</option>
                                            <option value="stones">Камни</option>
                                            <option value="Hideout">Укрытие</option>
                                            <option value="soil">Грунт</option>
                                        </select>
                                        <br>
                                        <label for="brand-select">Бренд:</label>
                                        <select name="brand" id="brand-select">
                                            @foreach ($brands as $brand)
                                                <option @if ($product->brand == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="status">Количество:</label>
                                        <input  value="{{ $product->status }}" type="number" id="status" name="status" class="inputLine">
                                        <br>
                                        <input type="submit" value="Изменить" class="btn">
                                    </form>
                                </div>
                            </div>
                            <div class="thirdBlock">
                                <div>
                                    <form method="POST" action="{{route('delete-product', $product->id)}}">
                                        @csrf @method('DELETE')
                                        <input type="submit" value="Удалить">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--                <div class="catalog-cards">--}}
{{--                    <article>--}}
{{--                        <form method="POST" action="{{route('update-product', $product->id)}}">--}}
{{--                        <div class="catalog-img-card">--}}
{{--                            <img src="../../public/images/product1.png" alt="photo">--}}
{{--                        </div>--}}
{{--                        <div class="catalog-text-card">--}}
{{--                            <div class="catalog-text-card-price">--}}
{{--                                <p>Набор безопасности №1</p>--}}
{{--                                <div class="product-price">--}}
{{--                                    <div>--}}
{{--                                        <span>Цвет:</span>--}}
{{--                                        <span class="circle1"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="items">--}}
{{--                                        <span>1990₽</span>--}}
{{--                                        <button><img src="../../public/images/favourit-icon.svg"></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
                    <article>
                        <div class="catalog-img-card">
                            <img src="../../public/images/product2.png" alt="photo">
                        </div>
                        <div class="catalog-text-card">
                            <div class="catalog-text-card-price">
                                <p>Набор безопасности №2</p>
                                <div class="product-price">
                                    <div>
                                        <span>Цвет:</span>
                                        <span class="circle2"></span>
                                    </div>
                                    <div class="items">
                                        <span>1990₽</span>
                                        <button><img src="../../public/images/favourit-icon.svg"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="catalog-img-card">
                            <img src="../../public/images/product3.png" alt="photo">
                        </div>
                        <div class="catalog-text-card">
                            <div class="catalog-text-card-price">
                                <p>Набор безопасности №3</p>
                                <div class="product-price">
                                    <div>
                                        <span>Цвет:</span>
                                        <span class="circle3"></span>
                                    </div>
                                    <div class="items">
                                        <span>1099₽</span>
                                        <button><img src="../../public/images/favourit-icon.svg"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="catalog-img-card">
                            <img src="../../public/images/product4.png" alt="photo">
                        </div>
                        <div class="catalog-text-card">
                            <div class="catalog-text-card-price">
                                <p>Набор безопасности №4</p>
                                <div class="product-price">
                                    <div>
                                        <span>Цвет:</span>
                                        <span class="circle4"></span>
                                    </div>
                                    <div class="items">
                                        <div>
                                            <span>699₽</span>
                                            <p>999₽</p>
                                        </div>
                                        <button><img src="../../public/images/favourit-icon.svg"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="catalog2">
            <div class="catalog-main">
                <div class="catalog-cards">
                    <article>
                        <div class="catalog-img-card">
                            <img src="../../public/images/product5.png" alt="photo">
                        </div>
                        <div class="catalog-text-card">
                            <div class="catalog-text-card-price">
                                <p>Набор безопасности №5</p>
                                <div class="product-price">
                                    <div>
                                        <span>Цвет:</span>
                                        <span class="circle5"></span>
                                    </div>
                                    <div class="items">
                                        <span>1099₽</span>
                                        <button><img src="../../public/images/favourit-icon.svg"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="catalog-img-card">
                            <img src="../../public/images/product6.png" alt="photo">
                        </div>
                        <div class="catalog-text-card">
                            <div class="catalog-text-card-price">
                                <p>Набор безопасности №6</p>
                                <div class="product-price">
                                    <div>
                                        <span>Цвет:</span>
                                        <span class="circle6"></span>
                                    </div>
                                    <div class="items">
                                        <span>2699₽</span>
                                        <button><img src="../../public/images/favourit-icon.svg"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="catalog-img-card">
                            <img src="../../public/images/product7.png" alt="photo">
                        </div>
                        <div class="catalog-text-card">
                            <div class="catalog-text-card-price">
                                <p>Набор безопасности №7</p>
                                <div class="product-price">
                                    <div>
                                        <span>Цвет:</span>
                                        <span class="circle7"></span>
                                    </div>
                                    <div class="items">
                                        <span>1099₽</span>
                                        <button><img src="../../public/images/favourit-icon.svg"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="catalog-img-card">
                            <img src="../../public/images/product8.png" alt="photo">
                        </div>
                        <div class="catalog-text-card">
                            <div class="catalog-text-card-price">
                                <p>Создать свой набор</p>
                                <div class="product-price">
                                    <div>
                                        <span>Цвет:</span>
                                        <span class="circle8"></span>
                                    </div>
                                    <div class="items">
                                        <div>
                                            <span>2799₽</span>
                                        </div>
                                        <button><img src="../../public/images/in-favourit.svg"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
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
