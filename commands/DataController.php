<?php

namespace app\commands;

use app\components\creater\PassportCreater;
use app\components\creater\UserCreater;
use app\models\Category;
use app\models\Passport;
use Faker\Factory;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\ActiveRecord;


class DataController extends Controller
{
    /**
     * @param ActiveRecord $record
     */
    public function showError(ActiveRecord $record)
    {
        echo 'Ошибки при создании записи ' . PHP_EOL;
        echo $record->getFirstError();
    }

    public function actionAdd()
    {
        $successUser = 0;
        for ($i = 0; $i < 1000; $i++){

            $user = UserCreater::create();
            $resultUserSave = $user->save();

            if ($resultUserSave) {
                $passport = PassportCreater::create($user);
                if (!$passport->save()) {
                    $this->showError($passport);
                }
            } else {
                $this->showError($user);
            }

            $successUser++;
            echo '.';
        }
        echo "Все ok" . PHP_EOL;
        echo PHP_EOL . ' Добавленно: ' . $successUser . ' пользователей';
    }

    public function actionAddCategory()
    {
        for ($i = 0; $i < 100; $i++)
        {
            $f = Factory::create('ru_RU');
            $category = new Category();
            $category->name = $f->text(10);
            $category->status = 1;
            $category->save();
        }
    }

    public function actionAddProduct()
    {
        $f = Factory::create('ru_RU');

    }

    public function actionAddOrder()
    {

    }
}