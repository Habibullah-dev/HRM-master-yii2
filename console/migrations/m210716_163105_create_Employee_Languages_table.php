<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Languages}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Languages}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_163105_create_Employee_Languages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Languages}}', [
            'id' => $this->primaryKey(),
            'language_id' => $this->integer(11),
            'fluency' => $this->string(55)->notNull(),
            'competency' => $this->string(55)->notNull(),
            'comments' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `language_id`
        $this->createIndex(
            '{{%idx-Employee_Languages-language_id}}',
            '{{%Employee_Languages}}',
            'language_id'
        );

        // add foreign key for table `{{%Languages}}`
        $this->addForeignKey(
            '{{%fk-Employee_Languages-language_id}}',
            '{{%Employee_Languages}}',
            'language_id',
            '{{%Languages}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Languages-created_by}}',
            '{{%Employee_Languages}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Languages-created_by}}',
            '{{%Employee_Languages}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Languages-updated_by}}',
            '{{%Employee_Languages}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Languages-updated_by}}',
            '{{%Employee_Languages}}',
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
        // drops foreign key for table `{{%Languages}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Languages-language_id}}',
            '{{%Employee_Languages}}'
        );

        // drops index for column `language_id`
        $this->dropIndex(
            '{{%idx-Employee_Languages-language_id}}',
            '{{%Employee_Languages}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Languages-created_by}}',
            '{{%Employee_Languages}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Languages-created_by}}',
            '{{%Employee_Languages}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Languages-updated_by}}',
            '{{%Employee_Languages}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Languages-updated_by}}',
            '{{%Employee_Languages}}'
        );

        $this->dropTable('{{%Employee_Languages}}');
    }
}
