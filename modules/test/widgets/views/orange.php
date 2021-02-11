<?php

use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var array $list */
?>

<h1>Orange Widget</h1>
<?php foreach ($list as $orange) :?>
    <p><?= $orange;?></p>
<?php endforeach;?>
