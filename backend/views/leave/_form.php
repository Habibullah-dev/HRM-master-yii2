<?php

use common\models\EmployeeUser;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leave */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leave-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php   
      $models= EmployeeUser::find()->all();
     $itemList=ArrayHelper::map($models,'employee_id','username');
    ?>

    <?= $form->field($model, 'employee_id')->dropDownList($itemList,['prompt'=>'Please select Employee']) ?>


    <?= $form->field($model, 'leave_type')->dropDownList(['leave without pay' => 'leave without pay','paid leave' => 'paid leave' , 'sick leave' => 'sick leave','casual leave' => 'casual leave']) ?>

    <?=  $form->field($model, 'from')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Leave start date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

<?=  $form->field($model, 'to')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Leave end date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

    <?= $form->field($model, 'reason')->textarea(['row' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(['pending' => 'pending' , 'approved' => 'approved' , 'declined' => 'declined']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
