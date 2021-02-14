<?php

use app\models\OrderSearch;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var OrderSearch $orderSearch */
/** @var View $this */
?>

<div class="container">
    <h1>Фильтрация и поиск</h1>
    <?php
    /** @var ActiveForm $form */
    $form = ActiveForm::begin([
        'action' => ['/order/index'],
        'method' => 'GET',
        'options' => ['data-pjax' => 1],
    ]); ?>
    <div class="row">
        <div class="col-sm-6 col-md-2"> <?= $form->field($orderSearch, 'status')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($orderSearch, 'total_price')->textInput() ?></div>
        <div class="col-sm-6 col-md-2">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <a class="btn btn-primary" href="<?= Url::to(['/order/create']) ?>">Добавить гангстера</a>
            <button type="submit" class="btn btn-success">Применить фильтры</button>
            <a class="btn btn-warning" href="<?= Url::to(['/order/search']) ?>">Сбросить фильтры</a>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
