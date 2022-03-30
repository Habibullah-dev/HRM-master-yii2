<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\EmployeeUser;
use common\models\Nationalities;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */
/* @var $data common\models\EmployeeUser */
/* @var $form  yii\bootstrap4\ActiveForm */

?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-8">

    <?php   
      $models= EmployeeUser::find()->all();
     $itemList=ArrayHelper::map($models,'employee_id','username');
    ?>

    <?= $form->field($model, 'employee_id')->dropDownList($itemList,['prompt'=>'Please select username']) ?>

    <?= $form->field($model, 'first_name')->textInput() ?>

    <?= $form->field($model, 'middle_name')->textInput() ?>

    <?= $form->field($model, 'last_name')->textInput() ?>

    <?= $form->field($model, 'employeeImage')->textInput(['type' => 'file' , 'id' => 'filePhoto']) ?>

    <?= $form->field($model, 'gender')->dropDownList(['male' => 'male', 'female' => 'female' , 'other' => 'others'],['prompt'=>'Please select']) ?>


    <?= $form->field($model, 'marital_status')->dropDownList(['single' => 'single', 'married' => 'married' , 'divorced' => 'divorced'],['prompt'=>'Please select']) ?> 
    
    <?php   
      $nationalites= Nationalities::find()->all();
     $items=ArrayHelper::map($nationalites,'id','name');
    ?>

    <?= $form->field($model, 'nationality')->dropDownList($items,['prompt'=>'Please select nationality']) ?>

   
    <?=  $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Birth date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

  

      </div>
        <div class="col-4">
            <div class="image-container image-wrapper">
               <img src="/storage/no_image.png" id="previewHolder" width="200px" height="200px" src="" alt="image preview">
            </div>
        </div>
    </div>

  


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
