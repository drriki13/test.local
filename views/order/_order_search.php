<?php

use app\models\Order;
use app\modules\test\widgets\ControlPanelWidgets;
use yii\data\ActiveDataProvider;
use yii\web\View;

/** @var ActiveDataProvider $dataProvider */
/** @var View $this */
?>

<div class="container">
    <h3>Гангстеры:</h3>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Total Price</th>
                <th scope="col">Panel</th>
            </tr>
            </thead>
            <tbody>
            <?php $orders = $dataProvider->models;
            /** @var Order $orders */
            foreach ($orders as $order) :?>
                <tr>
                    <th scope="row"><?= $order->id ?></th>
                    <td><?= $order->products->name ?></td>
                    <td><?= $order->products->price ?></td>
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