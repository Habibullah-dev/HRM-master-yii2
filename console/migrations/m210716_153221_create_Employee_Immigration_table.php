<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Immigration}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_153221_create_Employee_Immigration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Immigration}}', [
            'id' => $this->primaryKey(),
            'document_type' => $this->string(55)->notNull(),
            'number' => $this->string(255)->notNull(),
            'issued_by' => $this->string(255)->notNull(),
            'eligible_review_date' => $this->date()->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Immigration-created_by}}',
            '{{%Employee_Immigration}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Immigration-created_by}}',
            '{{%Employee_Immigration}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Immigration-updated_by}}',
            '{{%Employee_Immigration}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Immigration-updated_by}}',
            '{{%Employee_Immigration}}',
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
            '{{%fk-Employee_Immigration-created_by}}',
            '{{%Employee_Immigration}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Immigration-created_by}}',
            '{{%Employee_Immigration}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Immigration-updated_by}}',
            '{{%Employee_Immigration}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Immigration-updated_by}}',
            '{{%Employee_Immigration}}'
        );

        $this->dropTable('{{%Employee_Immigration}}');
    }
}
