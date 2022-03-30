<?php

/* @var $this yii\web\View */
use common\models\EmployeeSalary;
use common\models\PayGrades;
use yii\widgets\DetailView;

$this->title = 'HRM-Master | Employee Page';

$employeeId = Yii::$app->user->identity->employeeId;
$model = EmployeeSalary::findOne(['employee_id' => $employeeId]);

$payGrade = PayGrades::findOne(['id' => $model->pay_grade_id]);


?>
<div class="site-index">

    <div class="row">
        <div class="col-lg-6 m-auto p-2 employee-profile">
        <h3 class="text-center"> Salary Details </h3>
         <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'pay_grade_id',
                'label' => 'Pay Grade',
                 'value' =>  $payGrade->name
             ],
             [
                'attribute' =>  'pay_frequency',
                'label' => 'Pay Frequency',
             ],
            [
                'attribute' => 'currency',
                'label' => 'Currency',
             ],
              [
                'attribute' =>  'amount',
                'label' => 'Salary Amount ',
             ],
        ],
        ]) ?>

        </div> 
    
    </div>
   

 
</div>

]