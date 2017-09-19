<?php

use yii\helpers\Html;
use app\models\Division;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\People */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoriya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inside_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mts_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugakom_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'division_iddivision')->dropDownList(ArrayHelper::map(Division::find()->all(),'iddivision', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
