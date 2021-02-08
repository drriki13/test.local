<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var User $user */
?>
<div class="container">
    <div class="row">
        <h1>Добавить нового пользователя</h1>

       <?php
       $form = ActiveForm::begin([
            'id' => 'user-create-form',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($user, 'name') ?>
        <?= $form->field($user, 'last_name') ?>
        <?= $form->field($user, 'age') ?>
        <?= $form->field($user, 'email')->Input('email') ?>
        <?= $form->field($user, 'password')->passwordInput() ?>

        <div class="form-group">
            <div class="col-lg-offset-0 col-lg-11">
                <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>