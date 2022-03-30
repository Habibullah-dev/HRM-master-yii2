<?php

/* @var $this yii\web\View */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'HRM-Master | Employee Page';


?>
<div class="site-index">

    <div class="row">
        <div class="col-lg-6 m-auto p-2 employee-profile">
        <h3 class="text-center"> Resignation Form Details </h3>
        <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'relationship')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'home_telephone')->textInput(['type' => 'number']) ?>

<?= $form->field($model, 'mobile')->textInput(['type' => 'number']) ?>

<?= $form->field($model, 'work_telephone')->textInput(['type' => 'number']) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
        

        </div> 
    
    </div>
   

 
</div>

]