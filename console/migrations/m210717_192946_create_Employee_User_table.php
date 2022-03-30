<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_User}}`.
 */
class m210717_192946_create_Employee_User_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_User}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(55)->notNull(),
            'password' => $this->string(255)->notNull(),
            'employee_id' => $this->string(55),
            'accessKey' => $this->string(255)->notNull(),
            'authKey' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Employee_User}}');
    }
}
