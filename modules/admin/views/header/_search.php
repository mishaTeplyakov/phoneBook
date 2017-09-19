<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HeaderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="header-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idheader') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'code_amtz') ?>

    <?= $form->field($model, 'fax') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
