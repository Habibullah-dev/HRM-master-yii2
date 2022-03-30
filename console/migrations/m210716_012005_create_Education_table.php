<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Education}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_012005_create_Education_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Education}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Education-created_by}}',
            '{{%Education}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Education-created_by}}',
            '{{%Education}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Education-updated_by}}',
            '{{%Education}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Education-updated_by}}',
            '{{%Education}}',
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
            '{{%fk-Education-created_by}}',
            '{{%Education}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Education-created_by}}',
            '{{%Education}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Education-updated_by}}',
            '{{%Education}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Education-updated_by}}',
            '{{%Education}}'
        );

        $this->dropTable('{{%Education}}');
    }
}
