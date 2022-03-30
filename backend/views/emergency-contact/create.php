<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmergencyContact */

$this->title = 'Create Emergency Contact';
$this->params['breadcrumbs'][] = ['label' => 'Emergency Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emergency-contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
