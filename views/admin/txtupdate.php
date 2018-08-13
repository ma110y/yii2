<?
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>



<? $model = ActiveForm::begin(); ?>

<?= $model -> field($txt,'title') ?>

<?= $model -> field($txt, 'text') -> textarea(['rows' => 6]) ?>

<button class="btn btn-success" type="submit">Изменить</button>

<? $model = ActiveForm::end(); ?>

<br>

<a href="<?=Url::to(['admin/text'])?>"><button class="btn-block">Назад</button></a>