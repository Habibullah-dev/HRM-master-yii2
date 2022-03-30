<?php

use common\models\Employee;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSurbodinate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-surbodinate-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php   
      $models= Employee::find()->all();
     $itemList=ArrayHelper::map($models,'id','id');
    ?>

    <?= $form->field($model, 'name')->dropDownList($itemList,['prompt'=>'Please select Supervisor username']) ?>



    <?= $form->field($model, 'reporting_method')->dropDownList(['Direct' => 'Direct', 'Indirect' => 'Indirect', 'Others' => 'Others'],['prompt'=>'Please select Reprting Method']) ?>

    <hr>
    <?= $form->field($model, 'surbodinateAttachment')->textInput(['type' => 'file']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
