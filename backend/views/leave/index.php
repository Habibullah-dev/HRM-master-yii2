<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dmodel common\models\Leave */

$this->title = 'Leaves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leave', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'employee_id',
            'leave_type',
            'from:datetime',
            'to:datetime',
            'reason',
               [
                   'attribute' => 'status',
                   'format' => ['html'] ,
                   'value'=>  fn($model) => Html::tag('span' ,$model->status ,[
                       'class' =>   ($model->status == 'approved' ? 'badge badge-success ':
                                    ($model->status == 'pending' ? 'badge badge-dark':
                                    ($model->status == 'declined'  ?  'badge badge-danger' : 'none')))
                   ])
                ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
