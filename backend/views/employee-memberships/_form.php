<?php

use common\models\Memberships;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeMemberships */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="employee-memberships-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?php   
      $models= Memberships::find()->all();
     $itemList=ArrayHelper::map($models,'id','name');
    ?>

    <?= $form->field($model, 'name')->dropDownList($itemList,['prompt'=>'Please select Membership']) ?>


    <?= $form->field($model, 'reporting_method')->dropDownList(['Direct' => 'Direct', 'Indirect' => 'Indirect', 'Others' => 'Others'],['prompt'=>'Please select Reprting Method']) ?>

    <hr>
    <?= $form->field($model, 'membershipAttachment')->textInput(['type' => 'file']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
