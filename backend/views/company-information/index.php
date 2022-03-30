<?php
use backend\models\User; 
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Informations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-information-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Company Information', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'organization_name',
            // 'tax_id',
            'number_of_employees',
            'registration_number',
            'phone',
            // 'fax',
            'email:email',
            'address',
            'city',
            // 'state',
            // 'zip_code',
            'country',
            // 'created_at:datetime',
            // 'updated_at:datetime',
            //  [
            //      'attribute' =>'created_by',
            //      'value' => fn($data) => User::findOne(['id' => $data->created_by])->username
            //  ],
            //  [
            //     'attribute' =>'created_by',
            //     'value' => fn($data) => User::findOne(['id' => $data->updated_by])->username
            //  ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
