<?php

use app\models\Gangster;
use app\models\Gun;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var View $this */
/** @var Gangster $gangster */
?>

<div class="gangster-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($gangster, 'name')->textInput();?>

    <?= $form->field($gangster, 'last_name')->textInput();?>

    <?= $form->field($gangster, 'nickname')->textInput();?>

    <?= $form->field($gangster, 'city')->textInput();?>

    <?= $form->field($gangster, 'idWeapon')->dropDownList(
        Gun::getEmtyWeaponList(),
        ['prompt' => 'Без оружия']
    );?>

    <?= $form->field($gangster, 'status')->dropDownList(Gangster::getStatusList());?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']);?>
        <a href="<?= yii::$app->request->referrer;?>" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
