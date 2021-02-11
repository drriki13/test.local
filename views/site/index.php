<?php

use app\components\widgets\NameWidget;
use app\models\interfaces\IHaveName;
use yii\helpers\Url;

/* @var $this yii\web\View */
/** @var IHaveName[] $users */
/** @var IHaveName[] $gangsters */
/** @var IHaveName[] $guns */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <br class="jumbotron">
        <h1>Congratulations!</h1>

    </br>
        <a href="<?=Url::to(['user/test-user'])?>">User</a>
    </br>
        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">

                <?= NameWidget::widget(['objectsWithName' => $users]);?>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">

                <?= NameWidget::widget(['objectsWithName' => $gangsters]);?>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">

                <?= NameWidget::widget(['objectsWithName' => $guns]);?>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>
    </div>
</div>
