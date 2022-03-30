<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Resignation */

$this->title = 'Create Resignation';
$this->params['breadcrumbs'][] = ['label' => 'Resignations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row pt-4">
<div class="col-lg-6 m-auto p-2 ">
    <h1 class="text-center">Resignation Form</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>


</div>


