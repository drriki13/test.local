<?php

use app\models\People;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var People[] $peoples */
/** @var View $this */
/** @var Pagination $pages*/
?>

<h1>View for owners/cars</h1>

<div class="container">
    <div class="row">
        <?php foreach ($peoples as $owner) :?>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul>
                            <li>
                                Имя: <?= $owner->name?>
                            </li>
                            <li>
                                Фамилия: <?= $owner->last_name?>
                            </li>
                        </ul>
                    </div>
                    <?=$this->render('_owner_property', [
                        'owner' => $owner
                    ])?>
                    <a href="<?= Url::toRoute(['property/view', 'id' => $owner->id])?>">Подробно</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
    </div>
</div>
