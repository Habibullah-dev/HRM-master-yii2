<?php

use common\models\EmployeeUser;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ContactDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-details-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'home_telephone')->textInput() ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?= $form->field($model, 'work_telephone')->textInput() ?>

    <?= $form->field($model, 'work_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->textInput() ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <hr>
    <?= $form->field($model, 'contactAttachment')->textInput(['type' => 'file']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
