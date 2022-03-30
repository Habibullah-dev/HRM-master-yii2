<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\EmployeeLicense]].
 *
 * @see \common\models\EmployeeLicense
 */
class EmployeeLicenseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\EmployeeLicense[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\EmployeeLicense|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
