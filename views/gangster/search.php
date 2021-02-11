<?php

use app\models\GangsterSearch;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var GangsterSearch $gangsterSearch */
/** @var ActiveDataProvider $dataProvider */
/** @var View $this */
?>

<?= $this->render('_form_search', ['gangsterSearch' => $gangsterSearch]);?>
<?= $this->render('_gangster_search', ['dataProvider' => $dataProvider]);?>

<div class="container">
    <?php
    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]);
    ?>
</div>

