<?php

namespace app\controllers;


use app\models\User;
use app\models\UserSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii;

class UserController extends Controller
{
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

    public function actionView($id)
    {
        $user = User::find()->with('passport')->where(['id' => $id])->one();
        return $this->render('view', [
            'user' => $user,
        ]);
    }
}