<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%passport}}`.
 */
class m210202_125602_create_passport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%passport}}', [
            'id' => $this->primaryKey(),
            'number' => $this->integer(),
            'user_id' => $this->integer(),
            'code' => $this->integer(),
            'address' => $this->string(),
            'city' => $this->string(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->addForeignKey(
            'fk_user_id',
            'passport',
            'user_id',
            'user',
            'id',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%passport}}');
    }
}
