<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_education}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property string $level
 * @property string $institute
 * @property string $major
 * @property int $year
 * @property string $start_date
 * @property string $end_date
 * @property string|null $comments
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $employee
 * @property User $updatedBy
 */
class EmployeeEducation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $educationAttachment;
    public static function tableName()
    {
        return '{{%employee_education}}';
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
            [['employee_id', 'level', 'institute', 'major', 'year', 'start_date', 'end_date'], 'required'],
            [['year', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['start_date', 'end_date'], 'date', 'format' => 'php:Y/m/d'],
            [['comments'], 'string'],
            [['employee_id', 'level'], 'string', 'max' => 55],
            [['institute', 'major'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
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
            'educationAttachment' => 'Education Attachment(optional)',
            'employee_id' => 'Employee ID',
            'level' => 'Level*',
            'institute' => 'Institute*',
            'major' => 'Major/Specialization*',
            'year' => 'Year*',
            'start_date' => 'Start Date*',
            'end_date' => 'End Date*',
            'comments' => 'Comments',
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
     * @return \common\models\query\EmployeeEducationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeEducationQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->educationAttachment) {
            $this->attachment = '/EducationAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->educationAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->educationAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->educationAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
