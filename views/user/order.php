<?php

use app\models\UserOrder;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var UserOrder[] $orders */
?>

<div class="container">
    <?php foreach ($orders as $order) :?>
        <div class="row">
            <h1>Заказ №<?= $order->id ?>:</h1>
            <?php if ($order->gangster): ?>
                <h4>Имя: <?= $order->gangster->name ?></h4>
                <h4>Фамилия: <?= $order->gangster->last_name ?></h4>
                <h4>Прозвище: <?= $order->gangster->nickname ?></h4>
                <?php if ($order->gangster->gun): ?>
                    <h4>Оружие: <?= $order->gangster->gun->name ?></h4>
                <?php endif;?>
            <?php endif;?>
        </div>
        <div class="row">
            <?php if ($order->user): ?>
                <h1>Цель:</h1>
                <h4>Имя: <?= $order->user->name ?></h4>
                <h4>Фамилия: <?= $order->user->last_name ?></h4>
                <?php if ($order->user->passport): ?>
                    <h4>Адрес: <?= $order->user->passport->address ?></h4>
                <?php endif;?>
                <h4>Цена: <?= $order->price ?></h4>
            <?php endif;?>
        </div>
    <hr>
    <?php endforeach; ?>
    <div class="row">
        <a href="<?= Url::to('/user/search');?>" class="btn btn-default">Назад</a>
    </div>
</div>

