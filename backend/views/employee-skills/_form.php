<?php

use common\models\Skills;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSkills */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-skills-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php   
      $models= Skills::find()->all();
     $itemList=ArrayHelper::map($models,'id','name');
    ?>

    <?= $form->field($model, 'skill_id')->dropDownList($itemList,['prompt'=>'Please select skill']) ?>

    <?= $form->field($model, 'years_of_experience')->textInput([
        'type' => 'number'
    ]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <hr>
    <?= $form->field($model, 'skillAttachment')->textInput(['type' => 'file']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
