<?php

use app\assets\AjaxCryptoAsset;
use app\models\CryptoForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/** @var CryptoForm $cryptoForm */
/** @var array $data */
/** @var View $this */

AjaxCryptoAsset::register($this);
?>
<div class="container">
    <h1>Crypto / index</h1>
    <?php $form = ActiveForm::begin([
        'action' => '/crypto/index',
        'method' => 'GET',
    ]) ?>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($cryptoForm, 'altcoin')->dropDownList(CryptoForm::getAltcoinList()) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($cryptoForm, 'currencies')->checkboxList(CryptoForm::getCurrenciesList()) ?>
        </div>
        <div class="col-sm-4 mt-23">
            <?= Html::submitButton('Запросить', ['class' => 'btn btn-primary btn-down', 'name' => 'contact-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div class="js-ajax-wrap">
    <?= $this->render('_card', [
        'data' => $data,
        'cryptoForm' => $cryptoForm,
    ])?>
</div>