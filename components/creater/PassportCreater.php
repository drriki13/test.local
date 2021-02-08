<?php
namespace app\components\creater;

use \app\components\generation\Passport;
use app\models\User;
use yii;

abstract class PassportCreater
{
    /**
     * @param User $u
     * @return \app\models\Passport
     */
    public static function create($u){
        $passport = new \app\models\Passport();
        $passport -> number = rand(100000, 999999);
        $passport -> code = rand(1000, 9999);
        $passport -> address = Passport::randomAddress();
        $passport -> city = Passport::randomCity();
        $passport -> user_id = $u->id;

        return $passport;
    }
}