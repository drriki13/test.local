<?php

use app\models\User;
use app\modules\test\widgets\ControlPanelWidgets;
use yii\captcha\Captcha;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/** @var ActiveDataProvider $dataProvider */
?>
<div id="js-user-order-view-table">
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
                    <tr class="js-table-user-order-delete<?= $user->id ?>">
                        <th scope="row"><?= $user->id ?></th>
                        <td><?= $user->name ?></td>
                        <td><?= $user->last_name ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->salary ?></td>
                        <?php if ($user->passport): ?>
                            <td><?= $user->passport->code ?></td>
                            <td><?= $user->passport->number ?></td>
                        <?php else: ?>
                            <td></td>
                            <td></td>
                        <?php endif; ?>
                        <td>
                            <a href="<?= Url::toRoute(['user/order', 'id' => $user->id]) ?>" class="btn btn-success">Заказать</a>
                            <a href="<?= Url::toRoute(['user/order-ajax', 'id' => $user->id]) ?>"
                               class="btn btn-primary js-btn-user-order"
                               data-user-id="<?= $user->id ?>">Заказать</a>
                            <a href="<?= Url::toRoute(['user/order-delete', 'id' => $user->id]) ?>"
                               class="btn btn-danger js-btn-user-order-delete"
                               data-user-id="<?= $user->id ?>">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>