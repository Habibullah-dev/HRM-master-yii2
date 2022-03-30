<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_License}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Licences}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_163350_create_Employee_License_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_License}}', [
            'id' => $this->primaryKey(),
            'lincense_id' => $this->integer(11),
            'license_number' => $this->integer(11)->notNull(),
            'issued_date' => $this->date()->notNull(),
            'expiry_date' => $this->date()->notNull(),
            'comments' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `lincense_id`
        $this->createIndex(
            '{{%idx-Employee_License-lincense_id}}',
            '{{%Employee_License}}',
            'lincense_id'
        );

        // add foreign key for table `{{%Licences}}`
        $this->addForeignKey(
            '{{%fk-Employee_License-lincense_id}}',
            '{{%Employee_License}}',
            'lincense_id',
            '{{%Licences}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_License-created_by}}',
            '{{%Employee_License}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_License-created_by}}',
            '{{%Employee_License}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_License-updated_by}}',
            '{{%Employee_License}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_License-updated_by}}',
            '{{%Employee_License}}',
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
        // drops foreign key for table `{{%Licences}}`
        $this->dropForeignKey(
            '{{%fk-Employee_License-lincense_id}}',
            '{{%Employee_License}}'
        );

        // drops index for column `lincense_id`
        $this->dropIndex(
            '{{%idx-Employee_License-lincense_id}}',
            '{{%Employee_License}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_License-created_by}}',
            '{{%Employee_License}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_License-created_by}}',
            '{{%Employee_License}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_License-updated_by}}',
            '{{%Employee_License}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_License-updated_by}}',
            '{{%Employee_License}}'
        );

        $this->dropTable('{{%Employee_License}}');
    }
}
