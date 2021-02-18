<?php


namespace app\controllers;

use app\models\CryptoForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class CryptoController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $cryptoForm = new CryptoForm();
        $data = $cryptoForm->getAltcoinData();

        return $this->render('index',[
            'cryptoForm' => $cryptoForm,
            'data' => $data['data'] ?? [],
        ]);
    }

    /**
     * @return array
     */
    public function actionSendRequest()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $cryptoForm = new CryptoForm();
        $data = $cryptoForm->getAltcoinData();

        return [
            'success' => $data['success'],
            'error' => $data['error'],
            'view' => $this->renderAjax('_card', [
                'cryptoForm' => $cryptoForm,
                'data' => $data['data'] ?? []
            ])
        ];
    }
}