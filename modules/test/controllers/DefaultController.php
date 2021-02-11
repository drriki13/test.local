<?php

namespace app\modules\test\controllers;

use app\models\Gangster;
use app\modules\test\widgets\MandarinWidgets;
use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMandarin()
    {
        $gangsters = Gangster::find()->joinWith('gun')
            ->where(['=', 'gangster.status', '0'])
            ->andWhere(['=', 'gun.type', 'Пистолет'])->all();


        return $this->render('mandarin',
        [
            'gangsters' => $gangsters,
        ]);
    }
}
