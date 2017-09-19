<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DivisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отделы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="division-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создание нового отдела', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddivision',
            'name',
            'header_idheader',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
