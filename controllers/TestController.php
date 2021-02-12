<?php


namespace app\controllers;

use app\components\boy\Boy;
use app\components\boy\Chalk;
use app\components\car\Car;
use app\components\plant\Plant;
use yii\web\Controller;
use app\components\car\Engine;



class TestController extends Controller
{

    public function actionIndex()
    {
        $engine = new Engine();
        $car = new Car($engine);
        $car->startEngine();
        die;
    }

    public function actionBoy()
    {
        $chalk = new Chalk();
        $boy = new Boy();

        $boy->takeInHand($chalk)->writeText(Boy::class);

        die;
    }

    public function actionTank()
    {
        $tank = Plant::createTank();

        die;
    }

}