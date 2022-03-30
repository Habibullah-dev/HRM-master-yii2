<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Employee_Salary}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Pay_Grades}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210716_155238_create_Employee_Salary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Employee_Salary}}', [
            'id' => $this->primaryKey(),
            'pay_grade_id' => $this->integer(11)->notNull(),
            'pay_frequency' => $this->string(55)->notNull(),
            'currency' => $this->string(55),
            'amount' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `pay_grade_id`
        $this->createIndex(
            '{{%idx-Employee_Salary-pay_grade_id}}',
            '{{%Employee_Salary}}',
            'pay_grade_id'
        );

        // add foreign key for table `{{%Pay_Grades}}`
        $this->addForeignKey(
            '{{%fk-Employee_Salary-pay_grade_id}}',
            '{{%Employee_Salary}}',
            'pay_grade_id',
            '{{%Pay_Grades}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-Employee_Salary-created_by}}',
            '{{%Employee_Salary}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Salary-created_by}}',
            '{{%Employee_Salary}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-Employee_Salary-updated_by}}',
            '{{%Employee_Salary}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-Employee_Salary-updated_by}}',
            '{{%Employee_Salary}}',
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
        // drops foreign key for table `{{%Pay_Grades}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Salary-pay_grade_id}}',
            '{{%Employee_Salary}}'
        );

        // drops index for column `pay_grade_id`
        $this->dropIndex(
            '{{%idx-Employee_Salary-pay_grade_id}}',
            '{{%Employee_Salary}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Salary-created_by}}',
            '{{%Employee_Salary}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-Employee_Salary-created_by}}',
            '{{%Employee_Salary}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-Employee_Salary-updated_by}}',
            '{{%Employee_Salary}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-Employee_Salary-updated_by}}',
            '{{%Employee_Salary}}'
        );

        $this->dropTable('{{%Employee_Salary}}');
    }
}
