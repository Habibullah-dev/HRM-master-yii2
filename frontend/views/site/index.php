<?php

/* @var $this yii\web\View */

use common\models\CompanyBranch;
use common\models\Department;
use common\models\EmployeeJob;
use common\models\EmploymentStatus;
use common\models\JobCategories;
use common\models\JobTitles;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'HRM-Master | Employee Page';

$employeeId = Yii::$app->user->identity->employeeId;
$model = EmployeeJob::findOne(['employee_id' => $employeeId]);


$status = EmploymentStatus::findOne(['id' => $model->employment_status_id]);
$jobTitle = JobTitles::findOne(['id' => $model->job_title_id]);
$jobCategory = JobCategories::findOne(['id' => $model->job_category_id]);
$Department = Department::findOne(['id' => $model->department_id]);
$branch  = CompanyBranch::findOne(['id' => $model->company_branch_id]);




?>
<div class="site-index">

    <div class="row">
        <div class="col-lg-6 m-auto p-2 d-flex flex-column justify-content-center employee-profile">
        <p class="<?php echo $status->name == 'Active' ? 'badge badge-success' : 'badge badge-warning' ?>" > <?php echo $status->name ?></p>
         <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'employee_id',
            [
               'attribute' => 'employment_status_id',
               'label' => 'Employment Status',
                'value' =>   $status->name
            ],
            [
                'attribute' => 'job_title_id',
                'label' => 'Job Title',
                 'value' =>  $jobTitle->title
             ],
             [
                'attribute' => 'job_category_id',
                'label' => 'Job Category',
                 'value' =>  $jobCategory->name
             ],
            'joined_date',
            [
                'attribute' => 'department_id',
                'label' => 'Department',
                 'value' =>  $Department->name
             ],
              [
                'attribute' => 'company_branch_id',
                'label' => 'Company Branch',
                 'value' =>  $branch->location_name
             ],
            'contract_start_date',
            'contract_end_date',
        ],
        ]) ?>

        </div> 
    
    </div>
   

 
</div>
