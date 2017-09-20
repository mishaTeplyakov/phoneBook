<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\People */

$this->title = $model->idpeople;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'idpeople' => $model->idpeople, 'division_iddivision' => $model->division_iddivision], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'idpeople' => $model->idpeople, 'division_iddivision' => $model->division_iddivision], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpeople',
            'categoriya',
            'posada',
            'fio',
            'phone',
            'inside_phone',
            'mts_phone',
            'lugakom_phone',
            'division_iddivision',
        ],
    ]) ?>

</div>
