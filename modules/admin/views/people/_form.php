<?php

use app\models\Division;
use app\models\Header;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\People */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-form">

    <?php $form = ActiveForm::begin([

    ]); ?>

    <?= $form->field($model, 'categoriya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inside_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mts_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugakom_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_idheader')
        ->dropDownList(ArrayHelper::map(Header::find()->all(),'idheader','name'),
            [
                'prompt' => 'Выбрать объект почтовой связи...',
                'onchange' => '
                    $.post("'.Yii::$app->urlManager->createUrl('/admin/division/lists?id=').'"+$(this).val(),function(data){
                        $("select#people-division_iddivision").html(data);
                        });',
            ])?>

    <?= $form->field($model, 'division_iddivision')
        ->dropDownList(ArrayHelper::map(Division::find()->all(),'iddivision','name'),
            [
                'prompt' => 'Выбрать отдел...',
            ]
        )?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
