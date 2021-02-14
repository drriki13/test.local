<?php

use app\models\OrderSearch;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var OrderSearch $orderSearch */
/** @var ActiveDataProvider $dataProvider */
/** @var View $this */
?>
<?php \yii\widgets\Pjax::begin(['timeout' => 10000])?>
<?= $this->render('_form_search', ['orderSearch' => $orderSearch]);?>
<?= $this->render('_order_search', ['dataProvider' => $dataProvider]);?>

<div class="container">
    <?php
    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]);
    ?>
</div>
<?php \yii\widgets\Pjax::end()?>

