<?php

use app\components\widgets\AgeMenuWidget;
use app\models\Gangster;
use app\models\GangsterSearch;
use app\models\Gun;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var GangsterSearch $gangsterSearch */
/** @var View $this */
?>

<div class="container">
    <h1>Фильтрация и поиск</h1>
    <?php
    /** @var ActiveForm $form */
    $form = ActiveForm::begin([
        'action' => ['/gangster/search'],
        'method' => 'GET',
    ]); ?>
    <div class="row">
        <div class="col-sm-6 col-md-2"> <?= $form->field($gangsterSearch, 'name')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($gangsterSearch, 'last_name')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($gangsterSearch, 'nickname')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($gangsterSearch, 'city')->textInput() ?></div>
        <div class="col-sm-6 col-md-2">
            <?= $form->field($gangsterSearch, 'status')->dropDownList(
                Gangster::getStatusList(),
                ['prompt' => 'Все']
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-2">
            <?= $form->field($gangsterSearch, 'gunName')->dropDownList(
                Gun::getWeaponList(),
                ['prompt' => 'Выберите оружие']
            ) ?>
        </div>
        <div class="col-sm-6 col-md-2">
            <?= $form->field($gangsterSearch, 'gunType')->dropDownList(
                Gun::getTypeList(),
                ['prompt' => 'Выберите тип']
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <a class="btn btn-primary" data-pjax="0" href="<?= Url::to(['/gangster/create']) ?>">Добавить гангстера</a>
            <button type="submit" class="btn btn-success">Применить фильтры</button>
            <a class="btn btn-warning" data-pjax="0" href="<?= Url::to(['/gangster/search']) ?>">Сбросить фильтры</a>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
