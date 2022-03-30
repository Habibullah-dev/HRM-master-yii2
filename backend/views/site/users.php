<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\GridView;

$this->title = 'Signup';
?>
<div class="site-users mt-2">

<div class="row">
    <div class="col">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email'
        ],
    ]); ?>


        </div>
     
    </div>
</div>
