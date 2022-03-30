<?php

use yii\bootstrap4\Accordion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\Employee */

$this->title = 'view employee page';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$contactModel = $model->getContactDetail($model->employee_id);
$educationModel = $model->getEducation($model->employee_id);
$experienceModel = $model->getExperience($model->employee_id);
$employeeSkills = $model->getSkill($model->employee_id);
$employeeLanguage = $model->getLanguage($model->employee_id);
$employeeLicense = $model->getLicense($model->employee_id);
$employeeSalary =   $model->getSalary($model->employee_id);
$employeeMembership =   $model->getMembership($model->employee_id);
$employeeJob =   $model->getJob($model->employee_id);
$employeeImmigration =    $model->getImmigration($model->employee_id);
$employeeSupervisor =  $model->getSupervisor($model->employee_id);
$employeeSurbodinate =  $model->getSurbodinate($model->employee_id);
$employeeEmergencies =  $model->getEmmergency($model->employee_id);
$employeeDependants = $model->getDependants($model->employee_id);

?>
<div class="employee-view">
 
<h2 class="text-center text-primary"> <?= Html::tag('p' , Html::encode($model->first_name . ' ' . $model->last_name))?></h2>
   <div class="row p-3">
       <section class="col-4 wrapper shadow p-2">
           <div class="col">
           <div class="image-wrapper m-auto">
           <?= Html::img($model->getPhotographUrl(), [
               'alt' => 'My logo',
               'style' => 'width:200px ' ,]) ?>
           </div>
           
           <h4 class="text-center mt-3">Personal Information</h4>
           <hr>
           <div class="info p-2">
               
           <?= Html::tag('p' , Html::encode('Fullname:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($model->first_name . ' ' . $model->last_name))?>

           <?= Html::tag('p' , Html::encode('Gender:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($model->gender))?>

           <?= Html::tag('p' , Html::encode('Marital Status:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($model->marital_status))?>

           <?= Html::tag('p' , Html::encode('Date Of Birth:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($model->date_of_birth))?>

           <?php $_age = intval(date('Y', time() - strtotime($model->date_of_birth))) - 1970; ?>
           <?= Html::tag('p' , Html::encode('Age:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($_age))?>

           <?= Html::tag('p' , Html::encode('Date Created:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode(date("Y-m-d H:i:s",$model->created_at)))?>

         <a class="text-center" href=<?php echo Url::to(['employee/update' , 'id' => $model->id]) ?>>Edit Personal</a>
           </div> 
        </div>

        
              <!------------------- Employee Skills Details --------------------->
         <div class="employee-education mt-2  wrapper shadow p-2">
            <h4 class="text-center">Employee Skills</h4> 
            <hr>
            <?php  if(empty($employeeSkills)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-skills/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Skill id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSkills->skill_id))?>

           <?= Html::tag('p' , Html::encode('Years of experience') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSkills->years_of_experience). ' yrs')?>

            </div>

            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-skills/update' , 'id' => $employeeSkills->id]) ?>>Edit Skill</a>
            <?php  endif ?>
           </div>

        
      
        
           </section>

              

       <!------------------- Employee Contact Details --------------------->
       <section class="col-8 d-flex flex-column">
           <div class="contact-details  wrapper shadow p-2">
            <h4 class="text-center">Employee Contact Detail</h4> 
            <hr>
            <?php  if(empty($contactModel)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['contact-details/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Home Phone:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($contactModel->home_telephone))?>

           <?= Html::tag('p' , Html::encode('Mobile:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($contactModel->mobile))?>

           <?= Html::tag('p' , Html::encode('Work Email:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($contactModel->work_email))?>

           <?= Html::tag('p' , Html::encode('Phone:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($contactModel->phone))?>

            </div>
                <div class="col">
            <?= Html::tag('p' , Html::encode('Email:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($contactModel->email))?>

           <?= Html::tag('p' , Html::encode('Address:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($contactModel->address))?>
           <?= Html::tag('p' , Html::encode('State:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($contactModel->state))?>
           <?= Html::tag('p' , Html::encode('City:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($contactModel->city))?>
            
        </div>

            </div>
            <a class="text-center" href=<?php echo Url::to(['contact-details/update' , 'id' => $contactModel->id]) ?>>Edit Contact </a>
            <?php  endif ?>
           </div>
          
        
        
        <!------------------- Employee Education --------------------->
           <div class="employee-education mt-2  wrapper shadow p-2">
            <h4 class="text-center">Employee Education</h4> 
            <hr>
            <?php  if(empty($educationModel)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-education/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Level:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($educationModel->level))?>

           <?= Html::tag('p' , Html::encode('Institute:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($educationModel->institute))?>

           <?= Html::tag('p' , Html::encode('Major/specialization:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($educationModel->major))?>

            </div>
                <div class="col">
            <?= Html::tag('p' , Html::encode('Start date:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($educationModel->start_date))?>

           <?= Html::tag('p' , Html::encode('End Date:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($educationModel->end_date))?>
           <?= Html::tag('p' , Html::encode('Year:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($educationModel->year))?>
    
            
        </div>

            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-education/update' , 'id' => $educationModel->id]) ?>>Edit Education</a>
            <?php  endif ?>
           </div>
        

           
        <!------------------- Employee Experience Details --------------------->
        <div class="employee-education mt-2  wrapper shadow p-2">
            <h4 class="text-center">Employee Experience</h4> 
            <hr>
            <?php  if(empty($experienceModel)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-work-experience/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Company Name:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($experienceModel->company_name))?>

           <?= Html::tag('p' , Html::encode('Job Title:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($experienceModel->job_title))?>

            </div>
                <div class="col">
            <?= Html::tag('p' , Html::encode('Start date:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($experienceModel->start_date))?>

           <?= Html::tag('p' , Html::encode('End Date:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($experienceModel->end_date))?>
        
    
            
        </div>

            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-work-experience/update' , 'id' => $experienceModel->id]) ?>>Edit Work-Experince</a>
            <?php  endif ?>
           </div>

           <!------------------- Employee Salary --------------------->
           <div class="employee-education mt-2  wrapper shadow p-2">
            <h4 class="text-center">Employee Salary</h4> 
            <hr>
            <?php  if(empty($employeeSalary)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-salary/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Pay Grade Id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSalary->pay_grade_id))?>

           <?= Html::tag('p' , Html::encode('Pay Frequency:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSalary->pay_frequency))?>

            </div>
                <div class="col">
            <?= Html::tag('p' , Html::encode('Currency:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSalary->currency))?>

           <?= Html::tag('p' , Html::encode('Amount:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSalary->amount))?>
        
    
            
        </div>

            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-salary/update' , 'id' => $employeeSalary->id]) ?>>Edit Salary</a>
            <?php  endif ?>
           </div>

                 <!------------------- Employee Job --------------------->
        <div class="employee-education mt-2  wrapper shadow p-2">
            <h4 class="text-center">Employee Job</h4> 
            <hr>
            <?php  if(empty($employeeJob)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-job/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Job title Id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeJob->job_title_id))?>

           <?= Html::tag('p' , Html::encode('Employment status Id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeJob->employment_status_id))?>
           <?= Html::tag('p' , Html::encode('Department Id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeJob->department_id))?>

            </div>
                <div class="col">
            <?= Html::tag('p' , Html::encode('Company Branch Id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeJob->company_branch_id))?>

            <?= Html::tag('p' , Html::encode('Contract Start Date') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeJob->contract_start_date))?>

           <?= Html::tag('p' , Html::encode('Contract end Date:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeJob->contract_end_date))?>
        
    
            
        </div>

            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-job/update' , 'id' => $employeeJob->id]) ?>>Edit Job</a>
            <?php  endif ?>
           </div>

                                  
        <!------------------- Employee Immigration --------------------->
        <div class="employee-education mt-2  wrapper shadow p-2">
            <h4 class="text-center">Employee Immigration</h4> 
            <hr>
            <?php  if(empty($employeeImmigration)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-immigration/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Document Type:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeImmigration->document_type))?>

           <?= Html::tag('p' , Html::encode('Number*:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeImmigration->number))?>

            </div>
                <div class="col">
            <?= Html::tag('p' , Html::encode('Issued By:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeImmigration->issued_by))?>

           <?= Html::tag('p' , Html::encode('Eligible Review Date:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeImmigration->eligible_review_date))?>
        
    
            
        </div>

            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-immigration/update' , 'id' => $employeeImmigration->id]) ?>>Edit Immigration</a>
            <?php  endif ?>
           </div>
                     <!------------------- Employee Supervisor --------------------->
         <div class="employee-supervisor mt-2  wrapper shadow p-2">
               <h4 class="text-center">Employee Supervisor</h4> 
            <hr>
            <?php  if(empty($employeeSupervisor)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-supervisor/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Supersor Employyee_id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSupervisor->name))?>
                </div>
                <div class="col">
            
           <?= Html::tag('p' , Html::encode('Reporting_method') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSupervisor->reporting_method))?>
                </div>
     
            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-supervisor/update' , 'id' => $employeeSupervisor->id]) ?>>Edit Language</a>
            <?php  endif ?>

               </div>
                            <!------------------- Employee Surbodinate --------------------->
                            <div class="employee-language mt-2  wrapper shadow p-2">
               <h4 class="text-center">Employee Surbodinate</h4> 
            <hr>
            <?php  if(empty($employeeSurbodinate)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-surbodinate/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Supersor Employyee_id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSurbodinate->name))?>

                </div>
                <div class="col">
                <?= Html::tag('p' , Html::encode('Reporting_method') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeSurbodinate->reporting_method))?>

                </div>
     
            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-surbodinate/update' , 'id' => $employeeSurbodinate->id]) ?>>Edit Language</a>
            <?php  endif ?>

               </div>

            
                    <!------------------- Employee Dependant --------------------->
                    <div class="employee-language mt-2  wrapper shadow p-2">
               <h4 class="text-center">Employee Depandant</h4> 
            <hr>
            <?php  if(empty($employeeDependants)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-dependant/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <?php foreach ($employeeDependants as $employeeDependant):  ?>
                <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Dependant name') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeDependant->name))?>

           <?= Html::tag('p' , Html::encode('Dependant Relationship') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeDependant->relationship))?>
           
                </div>
                <div class="col">
            <?= Html::tag('p' , Html::encode('Dependant Date of Birth') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeDependant->date_of_birth))?>
           
                </div>
     
            </div>
            <p class="text-left"><a class="text-center" href=<?php echo Url::to(['employee-dependant/update' , 'id' => $employeeDependant->id]) ?>>Edit Depandant</a></p>
            
          <hr>
          <?php  endforeach   ?>
          <hr>
          <p class="text-left"><a class="text-center" href=<?php echo Url::to(['employee-dependant/create' , 'employee_id' => $employeeDependant->employee_id]) ?>>Add Dependant</a></p>
            <?php  endif ?>

               </div>


        </section>
   </div>

   <section>
       <div class="row">
           <div class="col">
               <!------------------- Employee Language --------------------->
               <div class="employee-language mt-2  wrapper shadow p-2">
               <h4 class="text-center">Employee Language</h4> 
            <hr>
            <?php  if(empty($employeeLanguage)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-languages/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Language Id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeLanguage->language_id))?>

           <?= Html::tag('p' , Html::encode('Fluency:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeLanguage->fluency))?>
                </div>
                <div class="col">
                    
            <?= Html::tag('p' , Html::encode('Competency:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeLanguage->competency))?>

                </div>
     
            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-languages/update' , 'id' => $employeeLanguage->id]) ?>>Edit Language</a>
            <?php  endif ?>

               </div>
           
                        <!------------------- Employee License --------------------->
                        <div class="employee-language mt-2  wrapper shadow p-2">
               <h4 class="text-center">Employee License</h4> 
            <hr>
            <?php  if(empty($employeeLicense)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-license/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col d-flex flex-column">
                <?= Html::tag('p' , Html::encode('License Id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeLicense->lincense_id))?>

           <?= Html::tag('p' , Html::encode('License Number:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeLicense->license_number))?>

                </div>
                <div class="col">
                <?= Html::tag('p' , Html::encode('Issued Date:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeLicense->issued_date))?>

           <?= Html::tag('p' , Html::encode('Expiry Date:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeLicense->expiry_date))?>

                </div>
           
            
            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-license/update' , 'id' => $employeeLicense->id]) ?>>Edit Licence</a>
            <?php  endif ?>

               </div>
           </div>

           <div class="col">

              <!------------------- Employee Membership --------------------->
             <div class="employee-language mt-2  wrapper shadow p-2">
               <h4 class="text-center">Employee Membership</h4> 
            <hr>
            <?php  if(empty($employeeMembership)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['employee-memberships/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <div class="row p-2">
                <div class="col d-flex flex-column">
                <?= Html::tag('p' , Html::encode('Membership Id:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeMembership->name))?>

           <?= Html::tag('p' , Html::encode('Reporting Method:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeMembership->reporting_method))?>

                </div>            
            </div>
            <a class="text-center" href=<?php echo Url::to(['employee-memberships/update' , 'id' => $employeeMembership->id]) ?>>Edit Memberships</a>
            <?php  endif ?>

            </div>


                    <!------------------- Employee Emergency Contact --------------------->
             <div class="mt-2  wrapper shadow p-2">
               <h4 class="text-center">Employee Emergency Contact</h4> 
            <hr>
            <?php  if(empty($employeeEmergencies)) : ?>
           <p class="text-muted text-center">No Information Found,to add <a href=<?php echo Url::to(['emergency-contact/create' , 'employee_id' => $model->employee_id]) ?>>Click Here</a> </p>
            
           <?php  else : ?>
            <?php foreach ($employeeEmergencies as $employeeEmergency):  ?>
                <div class="row p-2">
                <div class="col">
            <?= Html::tag('p' , Html::encode('Name:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeEmergency->name))?>

           <?= Html::tag('p' , Html::encode('Relationship:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeEmergency->relationship))?>
           
           <?= Html::tag('p' , Html::encode('Home Telephone:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeEmergency->home_telephone))?>
                </div>
                <div class="col">
            <?= Html::tag('p' , Html::encode('Mobile:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeEmergency->mobile))?>
           
           <?= Html::tag('p' , Html::encode('Work Telephone:') , ['class' => 'text-muted'])?>
           <?= Html::tag('p' , Html::encode($employeeEmergency->work_telephone))?>
                </div>
     
            </div>
            <p class="text-left"><a class="text-center" href=<?php echo Url::to(['emergency-contact/update' , 'id' => $employeeEmergency->id]) ?>>Edit Emergency Contact</a></p>
            
          <hr>
          <?php  endforeach   ?>
          <hr>
          <p class="text-left"><a class="text-center" href=<?php echo Url::to(['emergency-contact/create' , 'employee_id' => $employeeEmergency->employee_id]) ?>>Add Emergency Contact</a></p>
            <?php  endif ?>

               </div>



           </div>




       </div>


   </section>

</div>
