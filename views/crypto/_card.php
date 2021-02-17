<?php

use app\models\CryptoForm;
use yii\helpers\ArrayHelper;
use yii\web\View;

/** @var CryptoForm $cryptoForm */
/** @var array $data */
/** @var View $this */
?>
<?php if ($data): ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?= $cryptoForm->altcoin ?>
                    </div>
                    <div class="panel-body">
                        <?php if (ArrayHelper::keyExists('RUB', $data)): ?>
                            <br>
                            <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">
                            <?= number_format($data['RUB'], 2, ',', ' ') ?>
                        </span>
                                <span class="input-group-addon" id="basic-addon3">Рубли</span>
                            </div>
                        <?php endif; ?>
                        <?php if (ArrayHelper::keyExists('USD', $data)): ?>
                            <br>
                            <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">
                            <?= number_format($data['USD'], 2, ',', ' ') ?>
                        </span>
                                <span class="input-group-addon" id="basic-addon3">Долоры</span>
                            </div>
                        <?php endif; ?>
                        <?php if (ArrayHelper::keyExists('EUR', $data)): ?>
                            <br>
                            <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">
                            <?= number_format($data['EUR'], 2, ',', ' ') ?>
                        </span>
                                <span class="input-group-addon" id="basic-addon3">Евро</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
