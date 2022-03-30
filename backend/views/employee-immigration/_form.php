<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeImmigration */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="employee-immigration-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'document_type')->dropDownList(['passport' => 'Passport', 'Visa' => 'Visa'],['prompt'=>'Please select Level']) ?>

    <?= $form->field($model, 'number')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'issued_by')->textInput(['maxlength' => true]) ?>

     <?=  $form->field($model, 'eligible_review_date')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Eligible Review date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

<hr>
    <?= $form->field($model, 'immigrationAttachment')->textInput(['type' => 'file']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
