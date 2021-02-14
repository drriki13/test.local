<?php

use app\models\Order;
use yii\helpers\Url;

/** @var Order $order */
?>

<div class="container">
    <div class="row">
        <h1>Гангстер:</h1>
        <h4>Имя: <?= $order->status ?></h4>
        <h4>Фамилия: <?= $order->total_price ?></h4>
    </div>
    </div>
    <div class="row">
        <a href="<?= Url::to('index');?>" class="btn btn-default">Назад</a>
        <a href="<?= Url::toRoute(['order/update', 'id' => $order->id])?>" class="btn btn-primary">Редактировать</a>
        <a href="<?= Url::toRoute(['order/delete', 'id' => $order->id])?>" class="btn btn-danger">Удалить</a>
    </div>
</div>

