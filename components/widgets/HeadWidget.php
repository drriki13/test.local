<?php

namespace app\components\widgets;

use app\models\Player;
use yii\base\Widget;

class HeadWidget extends Widget
{
    /** @var string */
    public $message;
    /** @var string */
    public $desc = 'Описание';

//    public function init()
//    {
//        parent::init();
//        if ($this->message === null) {
//            $this->message = 'Hello World';
//        }
//    }

    public function run()
    {
        if ($this->message === null) {
            $this->message = 'Hello World';
        }

        $players = Player::find()->all();

        return $this->render('head',[
           'message' => $this->message,
            'desc' => $this->desc,
            'players' => $players,
        ]);
    }
}