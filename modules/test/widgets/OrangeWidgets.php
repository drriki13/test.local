<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class OrangeWidgets extends Widget
{
    public $list = [];

    public function run()
    {
        return $this->render('Orange', [
            'list' => $this->list,
        ]);
    }
}