<?php

namespace app\components\plant;

use app\components\tank\Tank;
use app\components\tank\Tbody;
use app\components\tank\Ttower;

abstract class Plant
{

    public static function createTank()
    {
        $t = self::createTower();
        $b = self::createBody();
        $tank = new Tank($t, $b);
        echo 'Танк создан!</br>';
        return $tank;
    }

    public static function createTower()
    {
        return new Ttower();
    }

    public static function createBody()
    {
        return new Tbody();
    }
}