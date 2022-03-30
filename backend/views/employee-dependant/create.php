<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeDepandant */

$this->title = 'Create Employee Depandant';
$this->params['breadcrumbs'][] = ['label' => 'Employee Depandants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-depandant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
