<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%employee_skills}}".
 *
 * @property int $id
 * @property string $employee_id
 * @property int $skill_id
 * @property int $years_of_experience
 * @property string|null $comments
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Employee $employee
 * @property Skills $skill
 * @property User $updatedBy
 */
class EmployeeSkills extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $skillAttachment;
    public static function tableName()
    {
        return '{{%employee_skills}}';
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
            [['employee_id', 'skill_id', 'years_of_experience'], 'required'],
            [['skill_id', 'years_of_experience', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['comments'], 'string'],
            [['employee_id'], 'string', 'max' => 55],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['skill_id'], 'exist', 'skipOnError' => true, 'targetClass' => Skills::className(), 'targetAttribute' => ['skill_id' => 'id']],
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
            'skillAttachment' => 'Skill Attachment(optional)',
            'employee_id' => 'Employee ID',
            'skill_id' => 'Skill ID (from admin created skill)*',
            'years_of_experience' => 'Years Of Experience*',
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
     * Gets query for [[Skill]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SkillsQuery
     */
    public function getSkill()
    {
        return $this->hasOne(Skills::className(), ['id' => 'skill_id']);
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
     * @return \common\models\query\EmployeeSkillsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeSkillsQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
      
        if($this->skillAttachment) {
            $this->attachment = '/skillAttachment/' . Yii::$app->security->generateRandomString(10) .'/'.$this->skillAttachment->name;
        }
            $ok = parent::save($runValidation,$attributeNames);
            $transaction = Yii::$app->db->beginTransaction();
           
            if($this->skillAttachment) {
            if($ok) {
                $fullpath = Yii::getAlias('@backend/web/storage' . $this->attachment);
                $dir = dirname($fullpath);
                if(!FileHelper::createDirectory($dir) || !$this->skillAttachment->saveAs($fullpath)) {
                    $transaction->rollBack();
                    return false;
                }
                $transaction->commit();
              
            }

        }
    
            return $ok;
        }    
}
