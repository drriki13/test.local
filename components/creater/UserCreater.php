<?php

namespace app\components\creater;

use \app\components\generation\User;
use yii;

abstract class UserCreater
{
    /**
     * @return \app\models\User
     */
    public static function create(){
        $user = new \app\models\User();
        $user->name = User::randomName();
        $user->last_name = User::randomLastName();
        $user->age = rand(18, 60);
        $user->email = User::randomEmail();
        $user->password = User::randomPass();
        $user->salary = rand(10000, 300000);

        return $user;
    }
}