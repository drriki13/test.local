<?php

use app\models\User;
use yii\helpers\Url;

/** @var User $user */
?>

<div class="container">
    <div class="row">
        <h1>Пользователь:</h1>
        <h4>Имя: <?= $user->name ?></h4>
        <h4>Фамилия: <?= $user->last_name ?></h4>
        <h4>Возраст: <?= $user->age ?></h4>
        <h4>E-mail: <?= $user->email ?></h4>
        <h4>Зарплата: <?= $user->salary ?></h4>
    </div>
    <div class="row">
        <?php if ($user->passport): ?>
            <h1>Паспорт:</h1>
            <h4>Серия: <?= $user->passport->code ?></h4>
            <h4>Номер: <?= $user->passport->number ?></h4>
            <h4>Город: <?= $user->passport->city ?></h4>
            <h4>Адрес: <?= $user->passport->address ?></h4>
        <?php endif;?>
    </div>
    <div class="row">
        <a href="<?= yii::$app->request->referrer;?>">Назад</a>
    </div>
</div>
