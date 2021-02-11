<?php

use app\models\Gangster;
use app\modules\test\widgets\MandarinWidgets;
use app\modules\test\widgets\OrangeWidgets;

/** @var Gangster[] $gangsters */
?>
<div class="container">
    <?= MandarinWidgets::widget(['list' => [
        'a' => ['/'],
        'b' => ['/site/contact'],
        'c' => ['/site/about'],
    ]])?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Прозвище</th>
            <th scope="col">Оружие</th>
            <th scope="col">Тип</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($gangsters as $gangster) :?>
            <tr>
                <th scope="row"><?= $gangster->id ?></th>
                <td><?= $gangster->name ?></td>
                <td><?= $gangster->last_name ?></td>
                <td><?= $gangster->nickname ?></td>
                <?php if ($gangster->gun): ?>
                    <td><?= $gangster->gun->name ?></td>
                    <td><?= $gangster->gun->type ?></td>
                <?php else: ?>
                    <td>Нет оружия</td>
                <?php endif; ?>
                <td><?= Gangster::getStatus($gangster->status)?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?= OrangeWidgets::widget([
        'list'=>[
            'orange',
            'red',
            'yellow'
        ]]);?>
</div>
