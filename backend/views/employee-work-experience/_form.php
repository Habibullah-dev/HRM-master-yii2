<?php

use kartik\date\DatePicker;
use yii\helpers\Html;

use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeWorkExperience */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="employee-work-experience-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    <hr>
    <?= $form->field($model, 'experienceAttachment')->textInput(['type' => 'file']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
