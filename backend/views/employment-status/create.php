<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmploymentStatus */

$this->title = 'Create Employment Status';
$this->params['breadcrumbs'][] = ['label' => 'Employment Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row mt-6">
<div class="employment-status-create col-6 m-auto">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>

