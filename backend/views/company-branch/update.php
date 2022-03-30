<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyBranch */

$this->title = 'Update Company Branch: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Company Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row mt-4">
<div class="company-branch-update col-6 m-auto">

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

</div>

</div>
