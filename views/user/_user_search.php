<?php

use app\models\User;
use yii\captcha\Captcha;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var ActiveDataProvider $dataProvider */
?>
<h1>Фильтрация пользователей</h1>

<div class="container">
    <h3>Пользователи:</h3>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">E-mail</th>
                <th scope="col">Зарплата</th>
                <th scope="col">Серия</th>
                <th scope="col">Номер</th>
                <th scope="col">View</th>
            </tr>
            </thead>
            <tbody>
            <?php $users = $dataProvider->models;
            /** @var User $user */
            foreach ($users as $user) :?>
                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->name ?></td>
                    <td><?= $user->last_name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->salary ?></td>
                    <?php if ($user->passport):?>
                        <td><?= $user->passport->code ?></td>
                        <td><?= $user->passport->number ?></td>
                    <?php endif;?>
                    <td><a href="<?= Url::toRoute(['user/view', 'id' => $user->id])?>">Просмотр</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!--<div class="container">-->
<!--    --><?php
//    /** @var User $one */
//    $i = 1;
//    foreach ($dataProvider->models as $one) :?>
<!--    <h4>--><?//=$i?><!--  (--><?//=$one->id?><!--)</h4>-->
<!--    --><?php
//    $i++;
//    endforeach; ?>
<!--</div>-->