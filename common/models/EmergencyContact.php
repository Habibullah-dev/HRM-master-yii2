<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%emergency_contact}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property string $name
 * @property string $relationship
 * @property int|null $home_telephone
 * @property int $mobile
 * @property int|null $work_telephone
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Employee $employee
 */
class EmergencyContact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $emergencyAttachment;
    public static function tableName()
    {
        return '{{%emergency_contact}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'name', 'relationship', 'mobile'], 'required'],
            [['home_telephone', 'mobile', 'work_telephone', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['employee_id', 'name', 'relationship'], 'string', 'max' => 55],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'emergencyAttachment' => 'Emergency Attachment (optional)',
            'name' => 'Name*',
            'relationship' => 'Relationship*',
            'home_telephone' => 'Home Telephone*',
            'mobile' => 'Mobile*',
            'work_telephone' => 'Work Telephone*',
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
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
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
     * @return \common\models\query\EmergencyContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmergencyContactQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->emergencyAttachment) {
            $this->attachment = '/EmergencyAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->emergencyAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->emergencyAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->emergencyAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }       

}
