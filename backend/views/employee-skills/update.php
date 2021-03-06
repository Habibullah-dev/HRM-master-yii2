<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSkills */

$this->title = 'Update Employee Skills ';
$this->params['breadcrumbs'][] = ['label' => 'Employee Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-skills-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
