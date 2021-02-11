<?php

use yii\db\Migration;

/**
 * Class m210210_124224_add_column_phone_in_user
 */
class m210210_124224_add_column_phone_in_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'phone', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'phone');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210210_124224_add_column_phone_in_user cannot be reverted.\n";

        return false;
    }
    */
}
