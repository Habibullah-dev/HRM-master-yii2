<?php

use common\models\PayGrades;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSalary */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="employee-salary-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php   
      $models= PayGrades::find()->all();
     $itemList=ArrayHelper::map($models,'id','name');
    ?>

    <?= $form->field($model, 'pay_grade_id')->dropDownList($itemList,['prompt'=>'Please select Membership']) ?>


    <?= $form->field($model, 'pay_frequency')->dropDownList(['Bi weekly' => 'Bi weekly', 'Hourly' => 'Hourly' , 'Monthly' => 'Monthly', 'Semi Monthly' => 'Semi Monthly', 'Weekly' => 'Weekly'],['prompt'=>'Please select Pay Frequency']) ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['type' , 'number']) ?>
    <hr>
    <?= $form->field($model, 'salaryAttachment')->textInput(['type' => 'file']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
