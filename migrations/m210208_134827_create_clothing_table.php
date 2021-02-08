<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clothing}}`.
 */
class m210208_134827_create_clothing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clothing}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'girl_id' => $this->integer(),
            'type' => $this->string(),
            'price' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clothing}}');
    }
}
