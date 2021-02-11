<?php

use app\models\Gangster;
use yii\web\View;

/** @var View $this */
/** @var Gangster $gangster */
?>

<div class="row">

    <h1>Редактирование: <?= $gangster->getFullName();?></h1>

    <?= $this->render('_form', [
        'gangster' => $gangster,
    ]);?>
</div>
