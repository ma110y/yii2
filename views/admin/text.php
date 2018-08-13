<?php

use app\models\TxtForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this -> title = 'Работа с текстом';

?>



<? $form = ActiveForm::begin(); //создание формы ?>

<?=$form -> field($post, 'title');  //форма ввода заголовка ?>

<?= $form -> field($post, 'text') -> textarea(['rows' => '5']); //форма ввода текста  ?>


<?=Html::submitButton('Сохранить', ['class' => 'btn btn-success'])?>

<? $form = ActiveForm::end(); //закрыли форму ?>

<br>
<h4>Текущий текст</h4>


<? foreach ($txt as $return){ ?>
    <h4 align="center"><?=$return->title?></h4>
    <?=$return->text?><br>
    <a href="<?=Url::to(['/admin/txtupdate','id' => $return -> id]) ?>"><button class="btn bg-info">Изменить</button></a>
<? } ?>