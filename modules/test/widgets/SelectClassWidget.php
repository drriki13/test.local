<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class SelectClassWidget extends Widget
{
    private $statusList = [
        'die',
        'live',
    ];
    public $status;

    public function run()
    {
        return $this->statusList[$this->status];
    }
}