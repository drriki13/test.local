<?php

namespace app\controllers;

use app\models\Player;
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

    /**
     * @param string $name
     * @param int|null $id
     * @return string
     * @throws \Exception
     */
    public function actionChangeTeam(string $name, int $id = null)
    {
        $team = Team::сhangeTeam($name, $id);
        debug($team); die('Все ок');
        return $this->render('view', [
            'team' => $team,
        ]);
    }

    /**
     * @param string $playerName
     * @param string $teamName
     * @return string
     * @throws \Exception
     */
    public  function actionChangePlayerTeam(string $playerName, string $teamName)
    {
        $player = Player::changePlayerTeam($playerName, $teamName);
        debug($player); die('Все ок');
        return $this->render('view', [
            'player' => $player,
            'team' => $team,
        ]);
    }
}