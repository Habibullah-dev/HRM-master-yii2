<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactDetails */

$this->title = 'Create Contact Details';
$this->params['breadcrumbs'][] = ['label' => 'Contact Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
