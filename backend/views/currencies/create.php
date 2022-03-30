<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Currencies */

$this->title = 'Create Currencies';
$this->params['breadcrumbs'][] = ['label' => 'Currencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row mt-4">
<div class="currencies-create col-6 m-auto">

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

</div>

</div>

