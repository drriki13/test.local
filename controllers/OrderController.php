<?php


namespace app\controllers;


use app\models\Order;
use app\models\OrderSearch;
use Yii;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex(){
        $params = yii::$app->request->queryParams;
        $orderSearch = new OrderSearch();
        $dataProvider = $orderSearch->search($params);
        return $this->render('index',
            [
                'orderSearch' => $orderSearch,
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionCreate()
    {
        $order = new Order();

        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            return $this->redirect(['view', [

            ]]);
        }

        return $this->render('create', [
            'order' => $order,
        ]);
    }

    public function actionView(int $id)
    {
        $order = Order::find()->where(['id' => $id])->one();
        return $this->render('view', [
            'order' => $order,
        ]);
    }

    public function actionDelete(int $id)
    {
        $order = Order::find()->where(['id' => $id])->one();
        $order->delete();
        return $this->redirect(['order/index']);
    }

    public function actionUpdate(int $id)
    {
        $order = Order::find()->where(['id' => $id])->one();

        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            return $this->redirect(['view', [

            ]]);
        }

        return $this->render('update', [
            'order' => $order,
        ]);
    }
}