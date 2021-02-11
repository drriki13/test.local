<?php

use app\modules\test\assets\HelloAsset;
use yii\web\View;

/** @var View $this */

HelloAsset::register($this);
?>

<h1 class="hello">Hello world!!!</h1>