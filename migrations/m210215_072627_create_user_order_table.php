<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_order}}`.
 */
class m210215_072627_create_user_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'gangster_id' => $this->integer(),
            'price' => $this->integer(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->addForeignKey('fk_user_order_id',
            'user_order',
            'user_id',
            'user',
            'id',
            'cascade',
            'cascade');

        $this->addForeignKey('fk_gangster_order_id',
            'user_order',
            'gangster_id',
            'gangster',
            'id',
            'cascade',
            'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_order}}');
    }
}
