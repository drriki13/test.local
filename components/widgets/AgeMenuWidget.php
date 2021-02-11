<?php

namespace app\components\widgets;

use app\models\User;
use Yii;
use yii\base\Widget;

class AgeMenuWidget extends Widget
{

    public function run()
    {
        //$usersMenu = User::find()->select(['id', 'age'])->groupBy('age')->orderBy('age desc')->asArray()->all();

        $db = Yii::$app->db;

        $sql = 'SELECT age, id, name,
                       count(id) AS cnt
                FROM user
                GROUP BY age
                ORDER BY age asc
                LIMIT 17';
        $usersMenu = $db->createCommand($sql)->queryAll();
        return $this->render('age-menu', [
            'usersMenu' => $usersMenu,
        ]);
    }
}