<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resignation}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 */
class m210722_183225_create_resignation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resignation}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->string(55)->notNull(),
            'reason' => $this->text()->notNull(),
            'letter' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

        // creates index for column `employee_id`
        $this->createIndex(
            '{{%idx-resignation-employee_id}}',
            '{{%resignation}}',
            'employee_id'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-resignation-employee_id}}',
            '{{%resignation}}',
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
            '{{%fk-resignation-employee_id}}',
            '{{%resignation}}'
        );

        // drops index for column `employee_id`
        $this->dropIndex(
            '{{%idx-resignation-employee_id}}',
            '{{%resignation}}'
        );

        $this->dropTable('{{%resignation}}');
    }
}
