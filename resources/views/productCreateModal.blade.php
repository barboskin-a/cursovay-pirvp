<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/productCreateModal.css') }}" rel="stylesheet">
    <title>Личный кабинет</title>
</head>
<body>
<div class="account">
    <div class="account-form">
        <form action="{{ route('product.create') }}" method="POST">
            @csrf
            @method('POST')
            <p>Добавить товар</p>
            <div class="form-group">
                <label for="photo">Фото</label>
                <input type="file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="color">Цвет</label>
                <input type="color" id="color" name="color">
            </div>
            <div class="form-group">
                <label for="quantity_product">Количество товара</label>
                <input type="number" id="quantity_product" name="quantity_product">
            </div>
            <div class="form-group">
                <label for="creator">Изготовитель</label>
                <input type="text" id="creator" name="creator">
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <input type="text" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="component_of_the_product">Компоненты в товаре</label>
                <input type="text" id="component_of_the_product" name="component_of_the_product">
            </div>
            <button type="submit" class="button_form">Сохранить</button>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
</body>
</html>