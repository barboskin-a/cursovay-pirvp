<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/order.css">
    <title>Оформление заказа</title>
</head>
<body>
<div class="wrapper">
    <main>
        <section class="forms">
            <h1>Оформление заказа</h1>
            <form method="post">
                <div class="form-group">
                    <label for="surname">Фамилия заказчика</label>
                    <input type="text" id="surname" name="name" required>
                </div>
                <div class="form-group">
                    <label for="name">Имя заказчика</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="middle-name">Отчество заказчика (при наличии)</label>
                    <input type="text" id="middle-name" name="name">
                </div>
                <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Электронная почта</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Адрес доставки</label>
                    <input type="email" id="address" name="email" required>
                </div>
                <div class="form-group-set">
                    <div>
                        <label for="flat">Квартира</label>
                        <input type="text" id="flat" name="address">
                    </div>
                    <div>
                        <label for="doorway">Подъезд</label>
                        <input type="text" id="doorway" name="address">
                    </div>
                    <div>
                        <label for="floor">Этаж</label>
                        <input type="text" id="floor" name="address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="delivery">Способ доставки</label>
                    <select id="delivery" name="delivery" required>
                        <option value="">Выберите способ</option>
                        <option value="courier">Курьером</option>
                        <option value="post">Почтой</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comments">Комментарий к заказу</label>
                    <textarea id="comments" name="comments" rows="4"></textarea>
                </div>
                <div class="sum-and-button">
                    <p>Итоговая сумма: <span>3980₽</span></p>
                    <button type="submit">Оформить заказ</button>
                </div>
            </form>
        </section>
    </main>
</div>
</body>
</html>

<?php
