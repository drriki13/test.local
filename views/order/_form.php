<?php

use app\models\Order;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var View $this */
/** @var Order $order */
?>

<div class="gangster-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($order, 'status')->textInput();?>

    <?= $form->field($order, 'total_price')->textInput();?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']);?>
        <a href="<?= yii::$app->request->referrer;?>" class="btn btn-danger">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
