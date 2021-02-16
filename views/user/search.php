<?php

use app\assets\UserAsset;
use app\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var UserSearch $userSearch */
/** @var ActiveDataProvider $dataProvider */
/** @var View $this */

UserAsset::register($this);
//!Как бы наследуеться в $depends у UserSearchPageAsset и вызывать его не нужно
//TestAsset::register($this);

//UserSearchPageAsset::register($this);

//Вызов виджета с параметрами
//echo HeadWidget::widget([
//    'message' => 'Какой то текст...',
//    'desc' => '12313',
//]);

echo $this->render('_form_search', ['userSearch' => $userSearch]);
echo $this->render('_user_search', ['dataProvider' => $dataProvider]);
?>


<div class="container">
    <?php
    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]);
    ?>
</div>
