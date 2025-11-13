<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/product_card.css') }}" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
    <div class="card">
        <div class="photo">
            <img src="../../public/images/product4.png" alt="photo">
        </div>
        <div class="name">
            <p>{{ $product->name }}</p>
        </div>
        <div class="color">
            <p>{{ $product->color }}</p>
        </div>
        <div class="price">
            <p>{{ $product->price }}</p>
        </div>
        <div class="description">
            <p>{{ $product->descroption }}</p>
        </div>
        <div class="component_of_the_product">
            <p>{{ $product->component_of_the_product }}</p>
        </div>
    </div>
</body>