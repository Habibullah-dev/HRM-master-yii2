<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_salary}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property int $pay_grade_id
 * @property string $pay_frequency
 * @property string|null $currency
 * @property int $amount
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $employee
 * @property PayGrades $payGrade
 * @property User $updatedBy
 */
class EmployeeSalary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $salaryAttachment;
    public static function tableName()
    {
        return '{{%employee_salary}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'pay_grade_id', 'pay_frequency', 'amount'], 'required'],
            [['pay_grade_id', 'amount', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['employee_id', 'pay_frequency', 'currency'], 'string', 'max' => 55],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['pay_grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayGrades::className(), 'targetAttribute' => ['pay_grade_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'salaryAttachment' => 'Salary Attachment (optional)',
            'employee_id' => 'Employee ID*',
            'pay_grade_id' => 'Pay Grade ID*',
            'pay_frequency' => 'Pay Frequency*',
            'currency' => 'Currency*',
            'amount' => 'Amount*',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
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
     * Gets query for [[PayGrade]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PayGradesQuery
     */
    public function getPayGrade()
    {
        return $this->hasOne(PayGrades::className(), ['id' => 'pay_grade_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EmployeeSalaryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeSalaryQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->salaryAttachment) {
            $this->attachment = '/SalaryAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->salaryAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->salaryAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->salaryAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
