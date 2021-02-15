<?php

use app\models\Order;
use app\models\Product;
use app\modules\test\widgets\ControlPanelWidgets;
use yii\data\ActiveDataProvider;
use yii\web\View;

/** @var ActiveDataProvider $dataProvider */
/** @var View $this */
?>

<div class="container">
    <h3>Заказы:</h3>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Total Price</th>
                <th scope="col">Panel</th>
            </tr>
            </thead>
            <tbody>
            <?php $orders = $dataProvider->models;
            /** @var Order $order */
            foreach ($orders as $order) :?>
                <tr>
                    <th scope="row"><?= $order->id ?></th>
                    <th scope="row"><?= $order->user->email ?></th>
                    <?php /** @var Product $product */
                    foreach ($order->products as $product) :?>
                        <th scope="row"><?= $product->category->name ?></th>
                        <td><?= $product->name ?></td>
                        <td><?= $product->price ?></td>
                    <?php endforeach; ?>
                    <td><?= $order->status ?></td>
                    <td><?= $order->total_price ?></td>
                    <td>
                    <?= ControlPanelWidgets::widget(['model' => $order])?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>