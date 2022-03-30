<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmergencyContact */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="emergency-contact-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relationship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_telephone')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'mobile')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'work_telephone')->textInput(['type' => 'number']) ?>

    <hr>
    <?= $form->field($model, 'emergencyAttachment')->textInput(['type' => 'file']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
