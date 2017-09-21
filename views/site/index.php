<?php
$this->title = 'ТЕЛЕФОННЫЙ СПРАВОЧНИК';
?>
<ul class="nav nav-tabs">
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="">Выпадающий список<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <!-- links -->
    </ul>
</li>
</ul>
    <div class="row">
    <?php foreach ($headers as $header):?>
        <div class="col-lg-6">
            <div class="page-header">
                <h2><?=$header->name?></h2>
                <p><b><i>Код АМТЗ:</i></b> <?=$header->code_amtz?></p>
                <p><b><i>Факс:</i></b> <?=$header->fax?></p>
                <p><b><i>E-mail:</i></b> <?=$header->email?></p>
                <p><b><i>Адрес:</i></b> <?=$header->adress?></p>
            </div>
        </div>

        <div class="col-lg-6  ">

        </div>
    </div>

        <head>
            <div class="input-group col-md-4 col-lg-push-8 ">
                <form action="<?= \yii\helpers\Url::to(['site/search'])?>" method="get" role="search">
                    <input id="search-field" name="q" type="text" class="form-control" placeholder="Искать...">
                </form>
            </div>
            <?php foreach ($header->divisions as $division):?>
                <caption>
                    <h4><i><?=$division->name?></i></h4>
                </caption>

                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Категория:</th>
                                <th>Должность:</th>
                                <th>Ф.И.О.:</th>
                                <th>Рабочий телефон:</th>
                                <th>Внутренний телефон:</th>
                                <th>Мобильный телефон:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($division->peoples as $people):?>
                                <tr>
                                    <td align="center"><?=$people->categoriya?></td>
                                    <td align="center"><?=$people->posada?></td>
                                    <td align="center"><?=$people->fio?></td>
                                    <td align="center"><?=$people->phone?></td>
                                    <td align="center"><?=$people->inside_phone?></td>
                                    <td>
                                        <?php if (!empty($people->mts_phone)):?>
                                            <li>MTC:<?=$people->mts_phone?></li>
                                        <?php endif;?>
                                        <?php if(!empty($people->lugakom_phone)):?>
                                            <li>Лугаком:<?=$people->lugakom_phone?></li>
                                        <?php endif;?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach;?>
        </head>
    <?php endforeach;?>

