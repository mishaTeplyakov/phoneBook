<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Header */

$this->title = 'Создание объекта связи';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
