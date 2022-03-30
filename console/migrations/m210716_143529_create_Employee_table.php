<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210716_143529_create_Employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->string(55)->notNull(),
            'first_name' => $this->string(55)->notNull(),
            'middle_name' => $this->string(55),
            'last_name' => $this->string(55)->notNull(),
            'photograph' => $this->string(255)->notNull(),
            'gender' => $this->string(55)->notNull(),
            'nationality' => $this->string(55)->notNull(),
            'marital_status' => $this->string(55)->notNull(),
            'date_of_birth' => $this->date()->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
            
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee-created_by}}',
            '{{%Employee}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee-created_by}}',
            '{{%Employee}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee-updated_by}}',
            '{{%Employee}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee-updated_by}}',
            '{{%Employee}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee-created_by}}',
            '{{%Employee}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee-created_by}}',
            '{{%Employee}}'
        );
          // drops foreign key for table `{{%user}}`
          $this->dropForeignKey(
            '{{%fk-Employee-updated_by}}',
            '{{%Employee}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee-updated_by}}',
            '{{%Employee}}'
        );

        $this->dropTable('{{%Employee}}');
    }
}
