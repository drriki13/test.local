<?php

use app\assets\ReverseStatusGangsterAsset;
use app\models\Gangster;
use yii\data\Pagination;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var Gangster[] $gangsters */
/** @var Pagination $pages */
/** @var View $this */

ReverseStatusGangsterAsset::register($this);
?>
<h1>Список гангстеров</h1>

<div class="container">
    <div class="alert alert-danger js-user-order-errors" hidden="true" role="alert">
        Error
    </div>
    <div class="row">
        <?php /** @var Gangster $gangster */
        foreach ($gangsters as $gangster) : ?>
            <div class="block<?= $gangster->id ?>">
                <?= $this->render('_card', ['gangster' => $gangster]); ?>
            </div>
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
