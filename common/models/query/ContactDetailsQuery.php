<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ContactDetails]].
 *
 * @see \common\models\ContactDetails
 */
class ContactDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ContactDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ContactDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
