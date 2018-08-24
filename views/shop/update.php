<?
use yii\widgets\ActiveForm;
?>

<?
if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов
?>


<? $this -> title = 'Изменить каталог'; ?>


<? $form = ActiveForm::begin(); ?>

<?= $form->field($catalog, 'name')?>

<?=$form->field($catalog, 'active')->dropDownList(['1' => 'Активный', '0' => 'Неактивный']); ?>

<button type="submit" class="btn btn-success">Изменить</button>

<? $form = ActiveForm::end(); ?>

