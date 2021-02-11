<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var array $usersMenu */
?>

<div class="col-sm-12">
    <h3>Age menu wigdet</h3>
    <ul class="inline">
        <?php /** @var array $menuItem */
        foreach ($usersMenu as $itemMenu) :?>
            <li>
                <?= Html::a(
                    $itemMenu['age'] . ' (' . $itemMenu['cnt'] . ')',
                    ['user/age','id' => $itemMenu['id'], 'name' => $itemMenu['name'], 'age' => $itemMenu['age']],
                    ['class'=>'btn btn-default']
                )?>

<!--                --><?//= Html::a(
//                    $itemMenu['age'] . ' (' . $itemMenu['cnt'] . ')',
//                    ['user/search', 'UserSearch[age]' => $itemMenu['age']],
//                    ['class'=>'btn btn-default']
//                )?>
<!--                --><?//= Html::a(
//                    $itemMenu['age'] . ' (' . $itemMenu['cnt'] . ')',
//                    Url::toRoute(['user/search', 'UserSearch[age]' => $itemMenu['age']]),
//                    ['class'=>'btn btn-default']
//                )?>
            </li>
        <?php endforeach; ?>

    </ul>
</div>