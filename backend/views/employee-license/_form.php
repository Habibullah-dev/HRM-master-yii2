<?php

use common\models\Licences;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeLicense */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="employee-license-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php   
      $models= Licences::find()->all();
     $itemList=ArrayHelper::map($models,'id','name');
    ?>

    <?= $form->field($model, 'lincense_id')->dropDownList($itemList,['prompt'=>'Please select skill']) ?>

    <?= $form->field($model, 'license_number')->textInput(['type' => 'number']) ?>

    <?=  $form->field($model, 'issued_date')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Issued date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

<?=  $form->field($model, 'expiry_date')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Expiry date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>


    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <hr>
    <?= $form->field($model, 'licenseAttachment')->textInput(['type' => 'file']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
