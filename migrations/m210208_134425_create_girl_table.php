<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%girl}}`.
 */
class m210208_134425_create_girl_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%girl}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(),
            'last_name' => $this->string(),
            'age' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%girl}}');
    }
}
