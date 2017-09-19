<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">


<head>
    <meta charset="<?= Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title)?></title>
    <?php $this->head()?>
</head>
<body>


<?php $this->beginBody() ?>



<div class="wrap">

    <?php

    NavBar::begin([
        'brandLabel' => 'Админ панель - ТЕЛЕФОННЫЙ СПРАВОЧНИК',
        'brandUrl' => 'admin/default/index',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Объекты почтовой связи', 'url' => ['/admin/header/index']],
            ['label' => 'Отделы', 'url' => ['/admin/division/index']],
            ['label' => 'Список сотрудников', 'url' => ['/admin/people/index']]
        ],
    ]);

    NavBar::end();

    ?>



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Почта ЛНР <?= date('d/m/Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
