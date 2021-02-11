<?php

namespace app\modules\test\widgets;

use yii\base\Widget;

class MandarinWidgets extends Widget
{
    /** @var array ['k'=>'v', 'k2'=>'v2'] */
    public $list = [];

    public function init()
    {
        parent::init();
        if (!$this->list)
        {
            $this->list = ['mandarin obishnii' => ['/site/index']];
        }
    }

    public function run()
    {
        return $this->render('mandarin', [
            'list' => $this->list,
        ]);
    }
}