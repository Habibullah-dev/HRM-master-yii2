<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSkills */

$this->title = 'Create Employee Skills';
$this->params['breadcrumbs'][] = ['label' => 'Employee Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-skills-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
