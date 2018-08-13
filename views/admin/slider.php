<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<? $this -> title = 'Работа со слайдером'; ?>

<a href="<?=Url::to(['admin/add_img'])?>"><button class="btn btn-success">Добавить новую картинку</button></a>

<h3>Добавленные:</h3><?

if(!$slider){ ?>Нет добавленных картинок<? } // сообщение если таблицы пуста


?>
<table class="table">

<?
foreach ($slider as $return){ ?> <!-- Вывод картинки/описания из д и ссылка на их удаление -->
    <tr>
        <td>
            <?=$return -> id?>
        </td>

        <td>
            <img src="/web/slider/<?=$return -> img?>" height="60px">
        </td>

        <td>
            <?=$return -> description?>
        </td>

        <td>
            <?=date("m.d.y", $return->time)?>
        </td>

        <td>
        <a href="<?=Url::to(['admin/update', 'id' => $return -> id])?>"> <img src="/web/css/icons/edit.png" alt="Редактировать"> </a>
        <a href="<?=Url::to(['admin/del', 'id' => $return -> id]);?>"> <img src="/web/css/icons/del.png" alt="Удалить"> </a>
        </td>
    </tr>
<? } ?>

</table>

<?php
echo LinkPager::widget([
'pagination' => $pages,
]);
?>

<a href="<?=Url::to(['admin/index'])?>"><button class="btn-block">В админ панель</button></a>

