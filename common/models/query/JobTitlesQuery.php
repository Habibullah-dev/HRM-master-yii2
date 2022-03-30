<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\JobTitles]].
 *
 * @see \common\models\JobTitles
 */
class JobTitlesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\JobTitles[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\JobTitles|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
