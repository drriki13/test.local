<?php

namespace app\components\generation;

use yii;

abstract class Passport
{
    /**
     * @return string
     */
    public static function randomAddress(){
        $addr = array(
            "Озерная",
            "Горная",
            "Костромская",
            "Никтиская",
            "Московская",
            "Центральная",
            "Набережная",
            "Дворечная"
        );

        return $addr[rand(0, 7)].' д. '. rand(1, 200);
    }

    /**
     * @return string
     */
    public static function randomCity(){
        $city = array(
            "Москва",
            "Кострома",
            "Киров",
            "Ярославль",
        );

        return $city[rand(0, 3)];
    }
}