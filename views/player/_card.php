<?php

use app\models\Player;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\View;


/** @var Player $player */
/** @var Pagination $pages */
/** @var View $this */
?>
<div class="col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="card-title"><?= $player->name ?></h4>
        </div>
        <div class="panel-body">
            <p class="card-text">
                Возраст: <?= $player->age ?> <br>
                Команда: <?= $player->team->name ?>
            </p>
        </div>
            <div class="panel-footer">
                <p class="card-text">
                    <a href="<?= Url::to(['/player/index', 'id' => $player->id])?>" class="btn btn-primary">Изменить</a>
                </p>
            </div>
    </div>
</div>