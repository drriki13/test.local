<?php

namespace app\controllers;

use app\models\User;
use app\models\UserOrder;
use app\models\UserSearch;
use app\widgets\UserOrderWidgets;
use yii\data\Pagination;
use yii\web\Controller;
use yii;
use yii\web\Response;

class UserController extends Controller
{
    public function beforeAction($action)
    {
        if (in_array($action->id, ['order-ajax', 'order-delete'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $query = User::find()->with('passport');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 5,
        ]);
        $users = $query->offset($pages->offset)->limit($pages->limit)->all();

//        $usersFormNativeSQL = Yii::$app->db->createCommand('SELECT * FROM {{user}}')->queryAll();
//        //Yii::$app->db->createCommand()->batchInsert('user', )


        return $this->render('index', [
            'users' => $users,
            'pages' => $pages,
        ]);
    }

    public function actionTestUser()
    {
//        $users = User::find()->orderBy([
//            'salary' => SORT_DESC,
//            'name' => SORT_ASC,
//        ])->asArray()->all();
//
//        $mainList = [
//            'Алексей',
//            'Роман',
//        ];
//
//
//        $users = User::find()->groupBy(['age'])->asArray()->all();

        $db = Yii::$app->db;


        $id = 3;
        $sql = 'select * from user where id = :id';
        $records = $db->createCommand($sql)->bindValues([
            ':id' => $id,
        ])->queryAll();

        debug($records);
        die;
    }

    public function actionCreate()
    {
        $user = new User();
        $requset = Yii::$app->request->post();

        if ($user->load($requset) && $user->validate()) {
            $user->password = yii::$app->security->generatePasswordHash($user->password);

            if ($user->save()) {
                Yii::$app->session->setFlash('success', "Пользователь успешно сохранен.");
                return $this->refresh();
            }

        } else {
            return $this->render('form/usercreate', ['user' => $user]);
        }
    }

    public function actionSearch()
    {
        $params = yii::$app->request->queryParams;
        $userSearch = new UserSearch();
        $dataProvider = $userSearch->search($params);
        return $this->render('search',
            [
                'userSearch' => $userSearch,
                'dataProvider' => $dataProvider
            ]);
    }

    public function actionView(int $id)
    {
        $user = User::find()->with('passport')->where(['id' => $id])->one();
        return $this->render('view', [
            'user' => $user,
        ]);
    }

    public function actionOrder(int $id)
    {
        $order = new UserOrder();
        $order->user_id = $id;
        $order->gangster_id = rand(1, 12);
        $order->price = rand(100000, 500000);
        $order->save();

        return $this->redirect(['user/search']);
    }

    public function actionOrderAjax(int $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($id == null)
            $id = yii::$app->request->post('id');

        $success = true;
        $error = null;

        $order = new UserOrder();
        $order->user_id = $id;
        $order->gangster_id = rand(1, 11);
        $order->price = rand(100000, 500000);
        if (!$order->save()){
            $firstErrorAsArray = $order->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }

        return [
            'error' => $error,
            'success' => $success,
            'view' => UserOrderWidgets::widget(),
        ];
    }

    public function actionOrderDelete(int $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($id == null)
            $id = yii::$app->request->post('id');

        $success = true;
        $error = null;

        $user = User::find()->where(['id' => $id])->one();
        $user->delete();

        return [
            'error' => $error,
            'success' => $success,
            'view' => UserOrderWidgets::widget(),
        ];
    }

    public function actionOrders()
    {
        $orders = UserOrder::find()->all();

        return $this->render('order', [
            'orders' => $orders,
        ]);
    }

    public function actionAge(int $id, string $name, int $age)
    {
        $users = User::find()->where(['age' => $age])->all();
        return $this->render('age', [
           'users' => $users,
        ]);
    }

    public function actionArt()
    {
        $users = User::find()->successful()->adult()->all();

        $a = 1;
        die();
    }
}