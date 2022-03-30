<?php
use backend\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-branch-index p-2">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Company Branch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'location_name',
            'city',
            'country', 
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
    ]);
   

?>


</div>
