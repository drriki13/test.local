<?php

use app\models\Order;
use yii\helpers\Url;

/** @var Order $order */
?>

<div class="container">
    <div class="row">
        <h1>Заказ №<?= $order->id ?>:</h1>
        <h4>Имя: <?= $order->user->name ?></h4>
        <h4>Фамилия: <?= $order->user->last_name ?></h4>
        <h4>E-mail: <?= $order->user->email ?></h4>
        <h4>Адрес: <?= $order->user->passport->address ?></h4>
    </div>
    <div class="row">
        <?php /** @var \app\models\Product $product */
        foreach ($order->products as $product):?>
            <h4>Категория: <?= $product->category->name ?></h4>
            <h4>Товар: <?= $product->name ?></h4>
            <h4>Ценна: <?= $product->price ?></h4>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <h4>Статус заказа: <?= Order::getStatus($order->status) ?></h4>
        <h4>Количество товара: <?= Order::getCountProduct($order->user_id) ?></h4>
        <h4>Общая цена: <?= $order->total_price ?></h4>
    </div>
</div>
<div class="row">
    <a href="<?= Url::to('index'); ?>" class="btn btn-default">Назад</a>
    <a href="<?= Url::toRoute(['order/update', 'id' => $order->id]) ?>" class="btn btn-primary">Редактировать</a>
    <a href="<?= Url::toRoute(['order/delete', 'id' => $order->id]) ?>" class="btn btn-danger">Удалить</a>
</div>
</div>

