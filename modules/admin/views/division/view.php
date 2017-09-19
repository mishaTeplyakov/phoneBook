<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Divisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="division-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'iddivision' => $model->iddivision, 'header_idheader' => $model->header_idheader], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'iddivision' => $model->iddivision, 'header_idheader' => $model->header_idheader], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
