<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSurbodinate */

$this->title = 'Create Employee Surbodinate';
$this->params['breadcrumbs'][] = ['label' => 'Employee Surbodinates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-surbodinate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
