<?php

use app\models\Gangster;
use yii\helpers\Url;
use yii\web\View;

/** @var Gangster $gangster */
/** @var View $this */
?>
<div class="col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="card-title"><?= $gangster->name ?>
                <td><?= $gangster->last_name ?></td>
            </h4>
        </div>
        <div class="panel-body">
            <p class="card-text">
                Прозвище: <?= $gangster->nickname ?> <br>
                Статус:
                <span class="label
                    <?php
                if ($gangster->status == 1)
                    echo 'label-success';
                else echo 'label-danger';
                ?>
                " id="status<?= $gangster->id ?>">
                    <?= Gangster::getStatus($gangster->status) ?>
                </span>
            </p>
        </div>
        <div class="panel-footer">
            <p class="card-text">
                <a href="<?= Url::toRoute(['gangster/reverse-status', 'id' => $gangster->id]) ?>"
                   class="btn btn-primary js-btn-gangster-reverse-status" data-pjax="1"
                   data-gangster-id="<?= $gangster->id ?>">Сменить статус</a>
                <a href="<?= Url::toRoute(['gangster/random-gangster', 'id' => $gangster->id]) ?>"
                   class="btn btn-warning js-btn-gangster-random-gangster" data-pjax="1"
                   data-gangster-id="<?= $gangster->id ?>">Randomize</a>
            </p>
        </div>
    </div>
</div>
