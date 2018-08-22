<?
use yii\widgets\ActiveForm;
?>

<? $form = ActiveForm::begin(); ?>

<?= $form->field($catalog, 'name')?>

<button type="submit" class="btn btn-success">Изменить</button>

<? $form = ActiveForm::end(); ?>

