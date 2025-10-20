<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/designer-product.css">
    <title>Конструктор товара</title>
</head>
<body>
<div class="wrapper">
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-constr">
                <label for="color">Выберите цвет брелока</label>
                <select id="color" name="color" required>
                    <option value="">Выберите цвет</option>
                    <option value="red">Красный</option>
                    <option value="blue">Синий</option>
                    <option value="red">Фиолетовый</option>
                    <option value="red">Розовый</option>
                    <option value="blue">Голубой</option>
                    <option value="green">Зеленый</option>
                    <option value="yellow">Желтый</option>
                    <option value="black">Черный</option>
                    <option value="white">Белый</option>
                </select>
            </div>
            <div class="form-constr-compl">
                <label>Выберите комплектацию брелока</label>
                <label><input type="checkbox" name="pompon" value="item1">Помпон</label>
                <label><input type="checkbox" name="alarm" value="item2">Сигнализация</label>
                <label><input type="checkbox" name="antiseptic in a case"
                              value="item3">Антисептик в чехле</label>
                <label><input type="checkbox" name="strap" value="item4">Ремешок</label>
                <label><input type="checkbox" name="case" value="item4">Чехол для
                    бутылочки</label>
                <label><input type="checkbox" name="tactical wand"
                              value="item4">Куботан</label>
                <label><input type="checkbox" name="whistle" value="item4">Свисток</label>
            </div>
            <div class="form-constr">
                <p>Итоговая сумма:<span>&ensp;0₽</span></p>
            </div>
            <button type="submit">Оформить заказ</button>
        </form>
    </main>
</div>
</body>
</html>

<?php
