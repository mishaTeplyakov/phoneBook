<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\People */

$this->title = 'Добавить сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrDivision' => $arrDivision,
    ]) ?>

</div>
