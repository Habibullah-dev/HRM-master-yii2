<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeMemberships */

$this->title = 'Create Employee Memberships';
$this->params['breadcrumbs'][] = ['label' => 'Employee Memberships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-memberships-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
