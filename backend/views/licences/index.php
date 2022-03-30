<?php
use backend\models\User; 
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Licences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licences-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Licences', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'created_at:datetime',
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
