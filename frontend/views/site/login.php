<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    

    <div class="row mt-5 ">
        <div class="col-lg-5 pt-5 m-auto employee-login shadow">
                <h1 class="text-center"> <span class="text-warning">HRM-Master</span></h1>
                <h2 class="text-center mt-5" >Employee Login Form</h2>
                <p class="text-muted">Please fill out the following fields to login:</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>



                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-warning btn-block', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
