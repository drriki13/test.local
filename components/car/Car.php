<?php

namespace app\components\car;

use yii;

class Car
{

    private $engine;

    /**
     * Car constructor.
     * @param Engine $engine
     */
    function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function startEngine(){
        $this->engine->start();
    }
}