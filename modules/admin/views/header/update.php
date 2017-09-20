<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Header */

$this->title = 'Обновить объект: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idheader]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="header-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
