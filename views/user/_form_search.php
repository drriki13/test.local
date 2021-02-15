<?php

use app\components\widgets\AgeMenuWidget;
use app\models\UserSearch;
use app\widgets\UserOrderWidgets;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var UserSearch $userSearch */
?>

<div class="container">
    <h1>Фильтрация и поиск</h1>
    <div class="row"><?= AgeMenuWidget::widget();?></div>
    <?php
    /** @var ActiveForm $form */
    $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'GET',
        'options' => ['data-pjax' => 1],
    ]);?>
    <div class="row">
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'name')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'last_name')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'email')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'salary')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'age')->textInput(); ?></div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'code')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'number')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div id="js-user-order-view"><?= UserOrderWidgets::widget()?></div>
            <button type="submit" class="btn btn-success">Применить фильтры</button>
            <a class="btn btn-warning" data-pjax="0"  href="<?= Url::to(['/user/search'])?>">Сбросить фильтры</a>
        </div>
    </div>
    <?php ActiveForm::end();?>
    <div class="alert alert-danger js-user-order-errors" hidden="true" role="alert">
        Error
    </div>
</div>
