<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Languages}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_012112_create_Languages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Languages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Languages-created_by}}',
            '{{%Languages}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Languages-created_by}}',
            '{{%Languages}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Languages-updated_by}}',
            '{{%Languages}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Languages-updated_by}}',
            '{{%Languages}}',
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
            '{{%fk-Languages-created_by}}',
            '{{%Languages}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Languages-created_by}}',
            '{{%Languages}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Languages-updated_by}}',
            '{{%Languages}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Languages-updated_by}}',
            '{{%Languages}}'
        );

        $this->dropTable('{{%Languages}}');
    }
}
