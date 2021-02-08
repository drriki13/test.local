<?php

namespace app\components\tank;

class Tank
{
    public $tower;
    public $body;

    public function __construct($tTower, $tBody)
    {
        $this->tower = $tTower;
        $this->body = $tBody;
        echo 'Башня и корпус собраны </br>';
        return $this;
    }
}