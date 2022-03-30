<?php

use backend\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\JobTitles */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Job Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="job-titles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' =>'created_by',
                'value' => fn($data) => User::findOne(['id' => $data->created_by])->username
            ],
            [
               'attribute' =>'created_by',
               'value' => fn($data) => User::findOne(['id' => $data->updated_by])->username
            ]
        ],
    ]) ?>




</div>
