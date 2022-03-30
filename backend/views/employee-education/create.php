<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeEducation */

$this->title = 'Create Employee Education';
$this->params['breadcrumbs'][] = ['label' => 'Employee Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
