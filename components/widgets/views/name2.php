<?php

use app\components\widgets\ObjectNameWidget;
use app\models\interfaces\IHaveName;
use yii\web\View;

/** @var View $this */
/** @var IHaveName[] $objectsWithName */
?>

<h2>NameWidget</h2>
<ul>
    <?php foreach ($objectsWithName as $obj): ?>
        <li><?= ObjectNameWidget::widget(['object' => $obj]);?> - <?= $obj->getName();?></li>
    <?php endforeach;?>
</ul>
