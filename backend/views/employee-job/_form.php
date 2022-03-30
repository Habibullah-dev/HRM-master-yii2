<?php

use common\models\CompanyBranch;
use common\models\Department;
use common\models\EmployeeUser;
use common\models\EmploymentStatus;
use common\models\JobCategories;
use common\models\JobTitles;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeJob */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="employee-job-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php   
      $jobTitleModel= JobTitles::find()->all();
     $itemTitle=ArrayHelper::map($jobTitleModel,'id','title');

     $statusModel= EmploymentStatus::find()->all();
     $itemStatus=ArrayHelper::map($statusModel,'id','name');

     $categoryModel=JobCategories::find()->all();
     $itemCategory=ArrayHelper::map($categoryModel,'id','name');

     $departmentModel=Department::find()->all();
     $itemDepartment=ArrayHelper::map($departmentModel,'id','name');

     $branchModel=CompanyBranch::find()->all();
     $itemBranch=ArrayHelper::map($branchModel,'id','location_name');


    ?>

    <?= $form->field($model, 'job_title_id')->dropDownList($itemTitle,['prompt'=>'Please select Job Title']) ?>
    <?= $form->field($model, 'employment_status_id')->dropDownList($itemStatus,['prompt'=>'Please select Employement status']) ?>
    <?= $form->field($model, 'job_category_id')->dropDownList($itemCategory,['prompt'=>'Please select Job Category']) ?>

  <?=  $form->field($model, 'joined_date')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Joined date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

    <?= $form->field($model, 'department_id')->dropDownList($itemDepartment,['prompt'=>'Please select Department']) ?>
    <?= $form->field($model, 'company_branch_id')->dropDownList($itemBranch,['prompt'=>'Please select Company Branch']) ?>


<?=  $form->field($model, 'contract_start_date')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Contract Start date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

<?=  $form->field($model, 'contract_end_date')->widget(DatePicker::classname(), [ 
        'options' => ['placeholder' => 'Enter Contract End date ...'], 
        'pluginOptions' => [ 
         'autoclose'=>true ,
         'format' => 'yyyy/mm/dd',
         'startView'=>'year',
 ] 
]);   ?>

<hr>
    <?= $form->field($model, 'jobAttachment')->textInput(['type' => 'file']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
