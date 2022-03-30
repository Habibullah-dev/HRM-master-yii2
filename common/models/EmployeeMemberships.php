<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_memberships}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property int|null $name
 * @property string $reporting_method
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $employee
 * @property Memberships $name0
 * @property User $updatedBy
 */
class EmployeeMemberships extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $membershipAttachment;
    public static function tableName()
    {
        return '{{%employee_memberships}}';
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
            [['employee_id', 'reporting_method'], 'required'],
            [['name', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['employee_id', 'reporting_method'], 'string', 'max' => 55],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['name'], 'exist', 'skipOnError' => true, 'targetClass' => Memberships::className(), 'targetAttribute' => ['name' => 'id']],
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
            'membershipAttachment' => 'Membership Attachment(optional)',
            'employee_id' => 'Employee ID',
            'name' => 'Name*',
            'reporting_method' => 'Reporting Method*',
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
     * Gets query for [[Name0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MembershipsQuery
     */
    public function getName0()
    {
        return $this->hasOne(Memberships::className(), ['id' => 'name']);
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
     * @return \common\models\query\EmployeeMembershipsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeMembershipsQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->membershipAttachment) {
            $this->attachment = '/MembershipAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->membershipAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->membershipAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->membershipAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
