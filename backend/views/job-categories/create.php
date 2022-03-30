<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JobCategories */

$this->title = 'Create Job Categories';
$this->params['breadcrumbs'][] = ['label' => 'Job Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row mt-4">
<div class="job-categories-create col-6 m-auto">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>

