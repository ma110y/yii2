<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<? $this -> title = 'Работа со слайдером'; ?>

<?


?><h3>Добавленные:</h3><?

if(!$slider){ ?>Нет добавленных картинок<? } // сообщение если таблицы пуста

foreach ($slider as $return){ ?> <!-- Вывод картинки/описания из д и ссылка на их удаление -->
    <img src="/web/slider/<?=$return -> img?>" height="60px">
    <?=$return -> description?>
    <a href="<?=Url::to(['admin/update', 'id' => $return -> id])?>">Редактировать</a>
    <a href="<?=Url::to(['admin/del', 'id' => $return -> id]);?>">Удалить</a> <br><br>

<? } ?>
<?php
echo LinkPager::widget([
'pagination' => $pages,
]);
?>

<h3>Добавить новые:</h3>


<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> <!-- создание формы -->

<?= $form -> field($post, 'description')?> <!-- текстовое поле -->

<?= $form -> field($post, 'img') -> fileInput();?> <!-- поле загрузки файла -->

<?= Html::submitButton('Добавить', ['class' => 'btn btn-success']); ?> <!-- Кнопка -->


<? $form - ActiveForm::end(); ?> <!-- Конец формы -->