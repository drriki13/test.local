<?php

use app\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\web\View;

/** @var UserSearch $userSearch */
/** @var ActiveDataProvider $dataProvider */
/** @var View $this */

echo $this->render('_form_search',['userSearch' => $userSearch]);
echo $this->render('_user_search',['dataProvider' => $dataProvider]);
?>


<div class="container">
    <?php
    echo \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]);
    ?>
</div>
