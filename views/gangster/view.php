<?php

use app\models\Gangster;
use yii\helpers\Url;

/** @var Gangster $gangster */
?>

<div class="container">
    <div class="row">
        <h1>Гангстер:</h1>
        <h4>Имя: <?= $gangster->name ?></h4>
        <h4>Фамилия: <?= $gangster->last_name ?></h4>
        <h4>Прозвище: <?= $gangster->nickname ?></h4>
        <h4>Город: <?= $gangster->city ?></h4>
        <h4>Статус:
            <?php
                switch ($gangster->status){
                    case 0: echo 'Мертв';
                        break;
                    case 1: echo 'Жив';
                        break;
                }
            ?>
        </h4>
    </div>
    <div class="row">
        <?php if ($gangster->gun): ?>
            <h1>Оружие:</h1>
            <h4>Название: <?= $gangster->gun->name ?></h4>
            <h4>Тип: <?= $gangster->gun->type ?></h4>
        <?php endif;?>
    </div>
    <div class="row">
        <a href="<?= Url::to('search');?>" class="btn btn-default">Назад</a>
        <a href="<?= Url::toRoute(['gangster/update', 'id' => $gangster->id])?>" class="btn btn-primary">Редактировать</a>
        <a href="<?= Url::toRoute(['gangster/delete', 'id' => $gangster->id])?>" class="btn btn-danger">Удалить</a>
    </div>
</div>

