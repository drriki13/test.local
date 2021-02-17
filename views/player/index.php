<?php

use app\models\Player;
use yii\data\Pagination;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/** @var Player[] $players */
/** @var Pagination $pages */
/** @var View $this */
?>
<?php Pjax::begin(['enablePushState' => false])?>
<h1>Список игроков</h1>

<div class="container">
    <div class="alert alert-danger js-user-order-errors" hidden="true" role="alert">
        Error
    </div>
    <div class="row">
        <?php /** @var Player $player */
        foreach ($players as $player) : ?>
            <?= $this->render('_card', ['player' => $player, 'pages' => $pages]); ?>
        <?php endforeach; ?>
    </div>
</div>
<div class="container">
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>
<?php Pjax::end()?>
