<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\People */

$this->title = 'Обновить сотрудника: ' . $model->idpeople;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpeople, 'url' => ['view', 'idpeople' => $model->idpeople, 'division_iddivision' => $model->division_iddivision]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="people-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
