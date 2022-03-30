<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%holiday}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210720_204440_create_holiday_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%holiday}}', [
            'id' => $this->primaryKey(),
            'holiday' => $this->string(255)->notNull(),
            'holiday_date' => $this->date()->notNull(),
            'description' => $this->text()->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-holiday-created_by}}',
            '{{%holiday}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-holiday-created_by}}',
            '{{%holiday}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-holiday-updated_by}}',
            '{{%holiday}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-holiday-updated_by}}',
            '{{%holiday}}',
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
            '{{%fk-holiday-created_by}}',
            '{{%holiday}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-holiday-created_by}}',
            '{{%holiday}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-holiday-updated_by}}',
            '{{%holiday}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-holiday-updated_by}}',
            '{{%holiday}}'
        );

        $this->dropTable('{{%holiday}}');
    }
}
