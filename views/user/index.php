<?php

use app\models\User;
use yii\data\Pagination;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var User[] $users */
/** @var View $this */
/** @var Pagination $pages*/

?>
<h1>View for user/index</h1>

<div class="container">
    <div class="row">
        <?php foreach ($users as $user) :?>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul>
                            <li>
                                имя: <?=$user->name?>
                            </li>
                            <li>
                                фамилия: <?=$user->last_name?>
                            </li>
                            <li>
                                возраст: <?=$user->age?>
                            </li>
                            <li>
                                зарпалата: <?=$user->salary?>
                            </li>
                            <li>
                                E-mail: <?=$user->email?>
                            </li>
                        </ul>
                    </div>
                    <?=$this->render('_user_passport', [
                            'user' => $user
                    ])?>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
    <div class="container">
        <div class="row">
            <?php
            echo LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </div>
    </div>
