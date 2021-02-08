<?php

namespace app\components\generation;

use yii;


 abstract class User
{
    private static $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789"; // функция range()

     /**
     * @return string
     */
    public static function randomName(){
        $name = array(
            "Александр",
            "Андрей",
            "Виталий",
            "Роман",
            "Сергей",
            "Алексей",
            "Евгений",
            "Иван"
        );

        return $name[rand(0, 7)];
    }

     /**
      * @return string
      */
     public static function randomLastName(){
        $lname = array(
            "Бобров",
            "Песков",
            "Соловьев",
            "Арсеньев",
            "Архипов",
            "Герасимов",
            "Беляков",
            "Белов"
        );

        return $lname[rand(0, 7)];
    }

     /**
      * @return string
      */
     public static function randomEmail(){
         $alphaLength = strlen(self::$alphabet) - 1;
         for ($i = 0; $i < 8; $i++) {
             $n = rand(0, $alphaLength);
             $mail[] = self::$alphabet[$n];
         }
         return implode($mail)."@mail.ru";
     }

     /**
      * @return string
      */
     public static function randomPass(){
         $alphaLength = strlen(self::$alphabet) - 1;
         for ($i = 0; $i < 8; $i++) {
             $n = rand(0, $alphaLength);
             $pass[] = self::$alphabet[$n];
         }
         return implode($pass);
     }
}