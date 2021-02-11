<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class TestWidgets extends Widget
{
    public function run()
    {
        return $this->render('test');
    }
}