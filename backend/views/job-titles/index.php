<?php

use backend\models\User; 
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $data common\models\JobTitles */
$this->title = 'Job Titles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-titles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job Titles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
             'id',
            'title',
            [
                'attribute' => 'description',
                 'format' => ['html'],
                 'value' => fn($data) => $data->getShortDescription()
              ],
              [
                'attribute' => 'created_at',
                 'format' => ['datetime']
              ],
            'updated_at:datetime',
             [
                 'attribute' =>'created_by',
                 'value' => fn($data) => User::findOne(['id' => $data->created_by])->username
             ],
             [
                'attribute' =>'created_by',
                'value' => fn($data) => User::findOne(['id' => $data->updated_by])->username
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
