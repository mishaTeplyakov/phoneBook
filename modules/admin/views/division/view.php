<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="division-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'iddivision' => $model->iddivision, 'header_idheader' => $model->header_idheader], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'iddivision' => $model->iddivision, 'header_idheader' => $model->header_idheader], [
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
            'iddivision',
            'name',
            'header_idheader',
        ],
    ]) ?>

</div>
