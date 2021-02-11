<?php


namespace app\components\widgets;


use app\models\interfaces\IHaveName;
use yii\base\Widget;

class NameWidget extends Widget
{
    /** @var IHaveName[] */
    public $objectsWithName = [];

    public function run()
    {
        return $this->render('name2', [
            'objectsWithName' => $this->objectsWithName,
        ]);
    }
}