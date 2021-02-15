<?php

use app\models\OrderSearch;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/** @var OrderSearch $orderSearch */
/** @var ActiveDataProvider $dataProvider */
/** @var View $this */
?>
<?php Pjax::begin(['timeout' => 10000])?>
<?= $this->render('_form_search', ['orderSearch' => $orderSearch]);?>
<?= $this->render('_order_search', ['dataProvider' => $dataProvider]);?>

<div class="container">
    <?php
    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]);
    ?>
</div>
<?php Pjax::end()?>

