<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyBranch */

$this->title = 'Create Company Branch';
$this->params['breadcrumbs'][] = ['label' => 'Company Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row mt-4">
<div class="company-branch-create col-6 m-auto">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>

