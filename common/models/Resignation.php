<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "resignation".
 *
 * @property int $id
 * @property string $employee_id
 * @property string $reason
 * @property string $letter
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Employee $employee
 */
class Resignation extends \yii\db\ActiveRecord
{
     /**
     * @var  yii\web\UploadedFile
     */
    public $letterFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resignation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'reason' ], 'required'],
            [['reason'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['employee_id'], 'string', 'max' => 55],
            [['letter'], 'string', 'max' => 255],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'letterFile' => 'Letter File',
            'employee_id' => 'Employee ID',
            'reason' => 'Reason',
            'letter' => 'Letter',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
     * @return \common\models\query\ResignationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ResignationQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        if($this->letterFile) {
    
            $this->letter = '/letterFiles/' . Yii::$app->security->generateRandomString(10) .'/'.$this->letterFile->name;
        }
        
        $transaction = Yii::$app->db->beginTransaction();
        $ok = parent::save($runValidation,$attributeNames);
        
        if($ok) {
            $fullpath = Yii::getAlias('@frontend/web/storage' . $this->letter);
            $dir = dirname($fullpath);
            if(!FileHelper::createDirectory($dir) || !$this->letterFile->saveAs($fullpath)) {
                $transaction->rollBack();
                return false;
            }
            $transaction->commit();
          
        }

        return $ok;
        
    }
}
