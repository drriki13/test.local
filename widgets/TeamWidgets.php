<?php


namespace app\widgets;


use app\models\Team;
use yii\base\Widget;

class TeamWidgets extends Widget
{
    public function run()
    {
        $teams = Team::find()->all();
        return $this->render('team', [
            'teams' => $teams,
        ]);
    }
}