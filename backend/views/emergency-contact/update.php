<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmergencyContact */

$this->title = 'Update Emergency Contact: ';
$this->params['breadcrumbs'][] = ['label' => 'Emergency Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emergency-contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
