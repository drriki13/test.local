<?php

use app\models\Passport;
use app\models\User;
use yii\db\Migration;

/**
 * Class m210202_133017_add_data
 */
class m210202_133017_add_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $u1 = new User();
        $u1 -> name = "Алексей";
        $u1 -> last_name = "Ершов";
        $u1 -> age = 34;
        $u1 -> email = "wswswd@mail.ru";
        $u1 -> password = "fsdfsdfasfdasfasdfe";
        $u1 -> salary = 30;
        $u1 -> save();

        $u2 = new User();
        $u2 -> name = "Андрей";
        $u2 -> last_name = "Синицин";
        $u2 -> age = 44;
        $u2 -> email = "wsgwd@mail.ru";
        $u2 -> password = "fsdfsdfasfdasfasdfe";
        $u2 -> salary = 25;
        $u2 -> save();

        $p1 = new Passport();
        $p1 -> number = 445566;
        $p1 -> code = 3415;
        $p1 -> address = "";
        $p1 -> city = "Москва";
        $p1 -> user_id = $u1->id;
        $p1 -> save();

        $p2 = new Passport();
        $p2 -> number = 445566;
        $p2 -> code = 3415;
        $p2 -> address = "";
        $p2 -> city = "Киров";
        $p2 -> user_id = $u2->id;
        $p2 -> save();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210202_133017_add_data cannot be reverted.\n";

        /** @var User $users */
        $users = User::find()->all();
        foreach ($users as $user) {
            $user->delete();
        }

        //\app\models\User::deleteAll();

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210202_133017_add_data cannot be reverted.\n";

        return false;
    }
    */
}
