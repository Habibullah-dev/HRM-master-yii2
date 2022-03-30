<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeEducation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-education-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'level')->dropDownList(['Post Graduate' => 'Post Graduate', 'Undergraduate' => 'Undergraduate' , 'Secondary' => 'Secondary'],['prompt'=>'Please select Level']) ?>

    <?= $form->field($model, 'institute')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'major')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'year')->textInput(['type' => 'number']) ?>

     <?=  $form->field($model, 'start_date')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Start date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>
     <?=  $form->field($model, 'end_date')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter End date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>


    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <hr>
    <?= $form->field($model, 'educationAttachment')->textInput(['type' => 'file']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
