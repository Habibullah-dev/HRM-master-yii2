<?php

namespace common\models;

use backend\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%company_information}}".
 *
 * @property int $id
 * @property string $organization_name
 * @property string $tax_id
 * @property int $number_of_employees
 * @property int $registration_number
 * @property int $phone
 * @property string|null $fax
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string|null $zip_code
 * @property string $country
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class CompanyInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%company_information}}';
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
            [['organization_name', 'tax_id', 'number_of_employees', 'registration_number', 'phone', 'email', 'address', 'city', 'state', 'country'], 'required'],
            [['number_of_employees', 'registration_number', 'phone', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['organization_name', 'email', 'address'], 'string', 'max' => 255],
            [['tax_id', 'fax', 'city', 'state', 'zip_code', 'country'], 'string', 'max' => 55],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'organization_name' => 'Organization Name',
            'tax_id' => 'Tax ID',
            'number_of_employees' => 'Number Of Employees',
            'registration_number' => 'Registration Number',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'email' => 'Email',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zip_code' => 'Zip Code',
            'country' => 'Country',
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
     * {@inheritdoc}
     * @return \common\models\query\CompanyInformationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyInformationQuery(get_called_class());
    }
}
