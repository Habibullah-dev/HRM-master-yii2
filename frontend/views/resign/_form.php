<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Resignation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resignation-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'letterFile')->textInput(['type' => 'file']) ?>



    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn-block btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
