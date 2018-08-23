<?
use yii\widgets\ActiveForm;
?>

<? $this -> title = 'Изменить каталог'; ?>


<? $form = ActiveForm::begin(); ?>

<?= $form->field($catalog, 'name')?>

<button type="submit" class="btn btn-success">Изменить</button>

<? $form = ActiveForm::end(); ?>

