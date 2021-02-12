<?php

use app\models\GangsterSearch;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var GangsterSearch $gangsterSearch */
/** @var ActiveDataProvider $dataProvider */
/** @var View $this */
?>
<?php \yii\widgets\Pjax::begin(['timeout' => 10000])?>
<?= $this->render('_form_search', ['gangsterSearch' => $gangsterSearch]);?>
<?= $this->render('_gangster_search', ['dataProvider' => $dataProvider]);?>

<div class="container">
    <?php
    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]);
    ?>
</div>
<?php \yii\widgets\Pjax::end()?>

