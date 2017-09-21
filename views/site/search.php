<?php
/**
 * Created by PhpStorm.
 * User: Тепляков_МА
 * Date: 21.09.2017
 * Time: 8:15
 */

$this->title = 'ТЕЛЕФОННЫЙ СПРАВОЧНИК';

?>
<h1>Результаты поиска</h1>
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
            <?php foreach ($query as $people):?>
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
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

