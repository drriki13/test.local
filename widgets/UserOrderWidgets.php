<?php


namespace app\widgets;


use app\models\Gangster;
use app\models\Team;
use app\models\User;
use app\models\UserOrder;
use yii\base\Widget;

class UserOrderWidgets extends Widget
{
    public function run()
    {
        $countOrder = UserOrder::find()->count();
        $countUser = User::find()->count();
        $countGangster = Gangster::find()->count();

        return $this->render('buttonOrder', [
            'countOrder' => $countOrder,
            'countUser' => $countUser,
            'countGangster' => $countGangster,
        ]);
    }
}