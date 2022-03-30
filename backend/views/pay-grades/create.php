<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PayGrades */

$this->title = 'Create Pay Grades';
$this->params['breadcrumbs'][] = ['label' => 'Pay Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row mt-5">
<div class="pay-grades-create col-6 m-auto">

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

</div>

</div>

