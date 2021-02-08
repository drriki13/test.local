<?php


namespace app\commands;


use app\models\User;
use yii\console\Controller;
use Yii;

class TestController extends Controller
{

    public function actionT2()
    {
        $db = Yii::$app->db;

        $data = [];

        $users = User::find()->limit(10)->orderBy([
            'id' => SORT_ASC,
        ])->select('age')->all();


        $i = 3;
        /**
         * @var User $user
         */
        foreach ($users as $user)
        {
            $oneRow = [
                $i,
                $user->age,
                $user->age,
                'Адрес '.$i,
            ];
            $data[] = $oneRow;
            $i++;
        }

        //var_dump($data); die;

        $colums = [
            'user_id',
            'number',
            'code',
            'address'
        ];

        $res = $db->createCommand()->batchInsert('passport', $colums, $data)->execute();
        var_dump($res);
    }

    public function actionT()
    {
        $db = Yii::$app->db;

//        $sql = 'select * from user';
//        $sqlInsert = "INSERT user(name, last_name, email) VALUES ('Galaxy S9', 'Samsung', 'dsdsds56@gf2.ee')";
//        $record = $db->createCommand($sqlInsert)->execute();
//        var_dump($record);

        $data = [
            [
                'Василий',
                'Герасимов',
                '35',
                'wolf13132@mail.ru'
            ],
            [
                'Алексей',
                'Германов',
                '23',
                'fox13132@mail.ru'
            ],
        ];
        $colums = [
            'name',
            'last_name',
            'age',
            'email'
        ];

        $res = $db->createCommand()->batchInsert('user', $colums, $data)->execute();
        var_dump($res);
    }
}