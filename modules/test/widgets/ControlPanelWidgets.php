<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class ControlPanelWidgets extends Widget
{
    public $model;

    public function run()
    {
        return $this->render('control-panel',[
            'model' => $this->model,
        ]);
    }
}