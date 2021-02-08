<?php


namespace app\controllers;


use app\models\Team;
use yii\web\Controller;

class TeamController extends Controller
{
    public function actionIndex()
    {
        $teams = Team::find()->all();

        return $this->render('index', [
            'teams' => $teams,
        ]);
    }
}