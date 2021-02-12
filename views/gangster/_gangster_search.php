<?php

use app\assets\DieAsset;
use app\models\Gangster;
use app\modules\test\widgets\ControlPanelWidgets;
use app\modules\test\widgets\SelectClassWidget;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;

/** @var ActiveDataProvider $dataProvider */
/** @var View $this */

DieAsset::register($this);
?>

<div class="container">
    <h3>Гангстеры:</h3>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Прозвище</th>
                <th scope="col">Город</th>
                <th scope="col">Оружие</th>
                <th scope="col">Статус</th>
                <th scope="col">Panel</th>
            </tr>
            </thead>
            <tbody>
            <?php $gangsters = $dataProvider->models;
            /** @var Gangster $gangster */
            foreach ($gangsters as $gangster) :?>
                <tr>
                    <th scope="row"><?= $gangster->id ?></th>
                    <td><?= $gangster->name ?></td>
                    <td><?= $gangster->last_name ?></td>
                    <td><?= $gangster->nickname ?></td>
                    <td><?= $gangster->city ?></td>
                    <?php if ($gangster->gun): ?>
                        <td><?= $gangster->gun->name ?></td>
                    <?php else: ?>
                        <td>Нет оружия</td>
                    <?php endif; ?>
                    <td class="<?= SelectClassWidget::widget(['status' => $gangster->status])?>">
                        <?= Gangster::getStatus($gangster->status)?>
                    </td>
                    <td>
<!--                        <a href="--><?//= Url::toRoute(['gangster/view', 'id' => $gangster->id])?><!--" class="btn btn-success">Подробно</a>-->
<!--                        <a href="--><?//= Url::toRoute(['gangster/update', 'id' => $gangster->id])?><!--" class="btn btn-primary">Редактировать</a>-->
<!--                        <a href="--><?//= Url::toRoute(['gangster/delete', 'id' => $gangster->id])?><!--" class="btn btn-danger">Удалить</a>-->
                    <?= ControlPanelWidgets::widget(['model' => $gangster])?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>