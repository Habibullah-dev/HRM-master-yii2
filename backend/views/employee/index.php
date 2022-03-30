<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
     <div class="d-flex justify-content-between">
     <p>
     <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     <p>
     <?= Html::a('Add Employee(sign-up)', ['signup-employee'], ['class' => 'btn btn-warning']) ?>
    </p>

     </div>
  

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'employee_id',
            'first_name',
            'middle_name',
            'last_name',
            'gender',
            'marital_status',
            'date_of_birth',
            //'nationality',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
