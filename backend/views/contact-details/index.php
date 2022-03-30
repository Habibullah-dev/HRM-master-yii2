<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Contact Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'employee_id',
            'home_telephone',
            'mobile',
            'work_telephone',
            //'work_email:email',
            //'other_email:email',
            //'phone',
            //'fax',
            //'email:email',
            //'address',
            //'city',
            //'state',
            //'zip_code',
            //'country',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
