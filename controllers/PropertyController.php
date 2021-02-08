<?php


namespace app\controllers;


use app\models\People;
use yii\data\Pagination;
use yii\web\Controller;

class PropertyController extends Controller
{
    public function actionIndex()
    {
        $query = People::find()->with('cars');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 5,
        ]);
        $peoples = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
            'peoples' => $peoples,
            'pages' => $pages
        ]);
    }

    public function actionView($id)
    {
        $owner = People::find()->with('cars')->where(['id' => $id])->one();
        return $this->render('view', [
            'owner' => $owner,
        ]);
    }
}