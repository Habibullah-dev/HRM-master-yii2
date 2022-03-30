<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Nationalities */

$this->title = 'Update Nationalities: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nationalities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row mt-4">
<div class="nationalities-update col-6 m-auto">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>    
</div>

