<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pets}}`.
 */
class m210208_133838_create_pet_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pets}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(),
            'type' => $this->string(),
            'color' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pets}}');
    }
}
