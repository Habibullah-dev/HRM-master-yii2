<?php

use kartik\date\DatePicker;
use yii\helpers\Html;

use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeDepandant */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="employee-depandant-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relationship')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Birth date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

<hr>
    <?= $form->field($model, 'dependantAttachment')->textInput(['type' => 'file']) ?>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
