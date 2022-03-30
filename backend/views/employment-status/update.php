<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmploymentStatus */

$this->title = 'Update Employment Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employment Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row mt-6">
<div class="employment-status-update col-6 m-auto">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


</div>
