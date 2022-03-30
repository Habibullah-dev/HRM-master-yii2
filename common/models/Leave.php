<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%leave}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property string $leave_type
 * @property string $from
 * @property string $to
 * @property string|null $reason
 * @property string $status
 *
 * @property Employee $employee
 */
class Leave extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%leave}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'leave_type', 'from', 'to', 'status'], 'required'],
            [['from', 'to'], 'safe'],
            [['employee_id', 'leave_type', 'status'], 'string', 'max' => 55],
            [['reason'], 'string', 'max' => 255],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'leave_type' => 'Leave Type',
            'from' => 'From',
            'to' => 'To',
            'reason' => 'Reason',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmployeeQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }


    /**
     * {@inheritdoc}
     * @return \common\models\query\LeaveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LeaveQuery(get_called_class());
    }
}
