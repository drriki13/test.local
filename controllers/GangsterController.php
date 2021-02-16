<?php


namespace app\controllers;

use app\models\Gangster;
use app\models\GangsterSearch;
use app\models\Gun;
use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class GangsterController extends Controller
{
    public function beforeAction($action)
    {
        if (in_array($action->id, ['reverse-status', 'random-gangster'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

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

    public function actionReverseStatus(int $id = null)
    {
        //sleep(3);
        $js = false;

        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($id == null){
            $js = true;
            $id = yii::$app->request->post('id');
        }

        $success = true;
        $error = null;

        /** @var Gangster $gangster */
        $gangster = Gangster::find()->where(['id' => $id])->one();

        $gangster->status = (int)!$gangster->status;

        if(!$gangster->save()){
            $firstErrorAsArray = $gangster->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }
        if($js){
            return [
                'error' => $error,
                'success' => $success,
                'status' => Gangster::getStatus($gangster->status)
            ];
        }else{
            return $this->redirect('/gangster/index/');
        }
    }

    public function actionRandomGangster(int $id = null)
    {
        $js = false;

        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($id == null){
            $js = true;
            $id = yii::$app->request->post('id');
        }

        $success = true;
        $error = null;

        $gangster = Gangster::randomizeGangster($id);

        if(!$gangster->save()){
            $firstErrorAsArray = $gangster->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }
        if($js){
            return [
                'error' => $error,
                'success' => $success,
                'view' => $this->renderAjax('_card', ['gangster' => $gangster]),
            ];
        }else{
            return $this->redirect('/gangster/index/');
        }
    }

    public function actionCreate()
    {
        $gangster = new Gangster();

        if ($gangster->load(Yii::$app->request->post()) && $gangster->save()) {
            Gun::setWeapon($gangster->idWeapon, $gangster->id);
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
            Gun::setWeapon($gangster->idWeapon, $gangster->id);
            return $this->redirect(['view', 'id' => $gangster->id]);
        }

        return $this->render('update', [
            'gangster' => $gangster,
        ]);
    }
}