<?php

use app\models\Team;
use yii\web\View;

/** @var View $this */
/** @var Team[] $teams */
?>
<div class="test">
    <?php foreach ($teams as $team):?>
        <h4>Команда: <?= $team->name?></h4>
    <?php endforeach;?>
</div>

