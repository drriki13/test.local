<?php


namespace app\components\widgets;

use yii\base\Widget;
use yii\db\ActiveRecord;

class ObjectNameWidget extends Widget
{
    /** @var ActiveRecord[] */
    public $object;

    public function run()
    {
        return $this->render('name1', [
            'object' => $this->object,
        ]);
    }
}