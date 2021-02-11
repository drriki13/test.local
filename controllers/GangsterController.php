<?php


namespace app\controllers;

use app\models\Gangster;
use app\models\GangsterSearch;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class GangsterController extends Controller
{
    public function actionIndex()
    {
        $query = Gangster::find()->with('gun');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 5,
        ]);
        $gangsters = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
            'gangsters' => $gangsters,
            'pages' => $pages,
        ]);
    }

    public function actionSearch()
    {
        $params = yii::$app->request->queryParams;
        $gangsterSearch = new GangsterSearch();
        $dataProvider = $gangsterSearch->search($params);
        return $this->render('search',
            [
                'gangsterSearch' => $gangsterSearch,
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionCreate()
    {
        $gangster = new Gangster();

        if ($gangster->load(Yii::$app->request->post()) && $gangster->save()) {
            return $this->redirect(['view', 'id' => $gangster->id]);
        }

        return $this->render('create', [
            'gangster' => $gangster,
        ]);
    }

    public function actionView(int $id)
    {
        $gangster = Gangster::find()->with('gun')->where(['id' => $id])->one();
        return $this->render('view', [
            'gangster' => $gangster,
        ]);
    }

    public function actionDelete(int $id)
    {
        $gangster = Gangster::find()->where(['id' => $id])->one();
        $gangster->delete();
        return $this->redirect(['gangster/search']);
    }

    public function actionUpdate(int $id)
    {
        $gangster = Gangster::find()->where(['id' => $id])->one();

        if ($gangster->load(Yii::$app->request->post()) && $gangster->save()) {
            return $this->redirect(['view', 'id' => $gangster->id]);
        }

        return $this->render('update', [
            'gangster' => $gangster,
        ]);
    }
}