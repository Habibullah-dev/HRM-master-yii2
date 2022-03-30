<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Contact_Details}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210716_144731_create_Contact_Details_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Contact_Details}}', [
            'id' => $this->primaryKey(),
            'home_telephone' => $this->integer(15),
            'mobile' => $this->integer(15)->notNull(),
            'work_telephone' => $this->integer(15),
            'work_email' => $this->string(255)->notNull(),
            'other_email' => $this->string(255),
            'phone' => $this->integer(11)->notNull(),
            'fax' => $this->string(55),
            'email' => $this->string(255),
            'address' => $this->string(255)->notNull(),
            'city' => $this->string(55)->notNull(),
            'state' => $this->string(55)->notNull(),
            'zip_code' => $this->integer(11),
            'country' => $this->string(55)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Contact_Details-created_by}}',
            '{{%Contact_Details}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Contact_Details-created_by}}',
            '{{%Contact_Details}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

          // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Contact_Details-updated_by}}',
            '{{%Contact_Details}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Contact_Details-updated_by}}',
            '{{%Contact_Details}}',
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
            '{{%fk-Contact_Details-created_by}}',
            '{{%Contact_Details}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Contact_Details-created_by}}',
            '{{%Contact_Details}}'
        );

          // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Contact_Details-updated_by}}',
            '{{%Contact_Details}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Contact_Details-updated_by}}',
            '{{%Contact_Details}}'
        );

        $this->dropTable('{{%Contact_Details}}');
    }
}
