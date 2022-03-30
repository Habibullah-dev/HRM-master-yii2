<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JobTitles */

$this->title = 'Update Job Titles: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Job Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row mt-4">
<div class="job-titles-update col-6 m-auto">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>

