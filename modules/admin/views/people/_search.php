<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeopleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpeople') ?>

    <?= $form->field($model, 'categoriya') ?>

    <?= $form->field($model, 'posada') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'inside_phone') ?>

    <?php // echo $form->field($model, 'mts_phone') ?>

    <?php // echo $form->field($model, 'lugakom_phone') ?>

    <?php // echo $form->field($model, 'header_idheader') ?>

    <?php // echo $form->field($model, 'division_iddivision') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
