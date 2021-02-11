<?php

use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var array $list */
?>

<h1>Mandarin Widget</h1>
<?php foreach ($list as $name => $url) :?>
    <a href="<?= Url::to($url)?>"><?= $name?></a> <br>
<?php endforeach;?>
