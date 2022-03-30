<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeLanguages */

$this->title = 'Create Employee Languages';
$this->params['breadcrumbs'][] = ['label' => 'Employee Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-languages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
