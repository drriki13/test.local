<?php


namespace app\controllers;


use app\models\Player;
use yii\data\Pagination;
use yii\web\Controller;

class PlayerController extends Controller
{


    public function actionIndex(int $id = null)
    {
        $query = Player::find()->with('team');
        if ($id) {
            /** @var Player $player */
            $player = Player::findOne(['id' => $id]);
            $player->age = rand(18, 65);
            if (!$player->save()){
                $error = $player->firstErrors;
            }

        }
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 2,
        ]);
        $players = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
            'players' => $players,
            'pages' => $pages,
        ]);
    }
}