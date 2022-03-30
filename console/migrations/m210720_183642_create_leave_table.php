<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leave}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 */
class m210720_183642_create_leave_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%leave}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->string(55)->notNull(),
            'leave_type' => $this->string(55)->notNUll(),
            'from' => $this->date()->notNull(),
            'to' => $this->date()->notNull(),
            'reason' => $this->string(255),
        ]);

        // creates index for column `employee_id`
        $this->createIndex(
            '{{%idx-leave-employee_id}}',
            '{{%leave}}',
            'employee_id'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-leave-employee_id}}',
            '{{%leave}}',
            'employee_id',
            '{{%employee}}',
            'employee_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%employee}}`
        $this->dropForeignKey(
            '{{%fk-leave-employee_id}}',
            '{{%leave}}'
        );

        // drops index for column `employee_id`
        $this->dropIndex(
            '{{%idx-leave-employee_id}}',
            '{{%leave}}'
        );

        $this->dropTable('{{%leave}}');
    }
}
