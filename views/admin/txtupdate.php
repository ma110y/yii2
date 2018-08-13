<?
use yii\widgets\ActiveForm;
?>



<? $model = ActiveForm::begin(); ?>

<?= $model -> field($txt,'title') ?>

<?= $model -> field($txt, 'text') -> textarea(['rows' => 6]) ?>

<button class="btn btn-success" type="submit">Изменить</button>

<? $model = ActiveForm::end(); ?>
