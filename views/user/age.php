<?php

use app\models\User;
use yii\helpers\Url;

/** @var User[] $users */

//debug(yii::$app->request->referrer); die;
?>

<div class="container">
    <h3>Пользователи:</h3>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Возраст</th>
                <th scope="col">Зарплата</th>
                <th scope="col">View</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) :?>
                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->name ?></td>
                    <td><?= $user->last_name ?></td>
                    <td><?= $user->age ?></td>
                    <td><?= $user->salary ?></td>
                    <td><a href="<?= Url::toRoute(['user/view', 'id' => $user->id])?>">Просмотр</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= yii::$app->request->referrer;?>">Назад</a>
    </div>
</div>