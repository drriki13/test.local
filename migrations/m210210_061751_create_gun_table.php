<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gun}}`.
 */
class m210210_061751_create_gun_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gun}}', [
            'id' => $this->primaryKey(),
            'gangster_id' => $this->integer()->unique(),
            'name' => $this->string(),
            'type' => $this->string(),
            'status' => $this->integer(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->addForeignKey(
            'fk_gangster_id',
            'gun',
            'gangster_id',
            'gangster',
            'id',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%gun}}');
    }
}
