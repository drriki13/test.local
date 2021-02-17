<?php


namespace app\controllers;


use app\components\CryptoCompareApi;
use app\models\CryptoForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class CryptoController extends Controller
{
    public function actionIndex()
    {

        $cryptoForm = new CryptoForm();
        if ($cryptoForm->load(yii::$app->request->get())){
            $data = (new CryptoCompareApi($cryptoForm))->getData();
        }

        return $this->render('index',[
            'cryptoForm' => $cryptoForm,
            'data' => $data ?? [],
        ]);

    }
}