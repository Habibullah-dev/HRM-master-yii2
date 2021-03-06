<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeMemberships */

$this->title = 'Update Employee Memberships: ';
$this->params['breadcrumbs'][] = ['label' => 'Employee Memberships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-memberships-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
