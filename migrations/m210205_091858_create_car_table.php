<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m210205_091858_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'people_id' => $this->integer(),
            'brand' => $this->string(),
            'model' => $this->string(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->addForeignKey(
            'fk_people_key',
            'car',
            'people_id',
            'people',
            'id',
            'cascade',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
