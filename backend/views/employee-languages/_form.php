<?php

use common\models\Languages;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeLanguages */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="employee-languages-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php   
      $models= Languages::find()->all();
     $itemList=ArrayHelper::map($models,'id','name');
    ?>

    <?= $form->field($model, 'language_id')->dropDownList($itemList,['prompt'=>'Please select skill']) ?>


    <?= $form->field($model, 'fluency')->dropDownList(['writing' => 'Writing', 'Speaking' => 'Speaking' , 'Reading' => 'Reading'],['prompt'=>'Please select Fluency']) ?>


    <?= $form->field($model, 'competency')->dropDownList(['poor' => 'poor', 'basic' => 'basic' , 'good' => 'good' , 'excellent' => 'excellent'],['prompt'=>'Please select Competency']) ?>


    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <hr>
    <?= $form->field($model, 'languageAttachment')->textInput(['type' => 'file']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
