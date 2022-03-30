<?php

/* @var $this yii\web\View */

use backend\models\User;
use common\models\Employee;
use common\models\Holiday;
use common\models\Leave;
use yii\helpers\Url;

;

$this->title = 'HRM-Master| Admin Dashboard';
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-3 employeeCard">
            <div class="card">
                <div class="card-body">
                    <span><i class="fas fa-users"></i></span>
                    <p>Employees</p>
                  <?php echo "<h1 class='text-success'> $totalEmployee </h1> "  ?>
                    <a class="text-muted" href=<?php echo Url::to(['/employee/index'])  ?>>More details <i class="fas fa-arrow-down"></i></a>
                </div>
            </div>
         
        </div>
        <div class="col-sm-3 leaveCard">
            <div class="card">
                <div class="card-body">
                    <span><i class="fas fa-sign-out-alt"></i></span>
                    <p>Leave</p>
                    <?php echo "<h1 class='text-dark'> $totalLeave </h1> "  ?>
                    <a class="text-muted" href=<?php echo Url::to(['/leave/index'])  ?>>More details <i class="fas fa-arrow-down"></i></a>
                </div>
            </div>

        </div>
        <div class="col-sm-3 holidayCard">
        <div class="card">
                <div class="card-body">
                    <span><i class="fas fa-plane"></i></span>
                    <p>Holiday</p>
                    <?php echo "<h1 class='text-primary'> $totalHoliday </h1> "  ?>
                    <a class="text-muted" href=<?php echo Url::to(['/holiday/index'])  ?>>More details <i class="fas fa-arrow-down"></i></a> 
                </div>
            </div>


        </div>
        <div class="col-sm-3 adminCard">
        <div class="card">
                <div class="card-body">
                    <span><i class="fas fa-user"></i></span>
                    <p>Admin Users</p>
                    <?php echo "<h1 class='text-warning'> $totalAdmin </h1> "  ?>
                    <a class="text-muted" href=<?php echo Url::to(['/site/users'])  ?>>More details <i class="fas fa-arrow-down"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>
