<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/product_card.css') }}" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
    <div class="card-wind">
        <div class="card">
            <div class="photo">
                <img src="../../public/images/product4.png" alt="photo">
            </div>
            <div class="texts">
                <div class="bold_text">
                    <div class="name">
                        <p>{{ $product->name }}</p>
                    </div>
                </div>
                <div class="reg_text">
                    <div class="description">
                        <p>{{ $product->descroption }}</p>
                    </div>
                    <div class="component_of_the_product">
                        <p>{{ $product->component_of_the_product }}</p>
                    </div>
                </div>
                <div class="cash_color">
                    <div class="color">
                        <span>Цвет:</span>
                        <span class="circle" style="background: {{ $product->color }};"></span>
                    </div>
                    <div class="price">
                        <p>{{ $product->price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>