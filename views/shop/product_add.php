<?
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
?>


<?
if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов
?>


<? $this -> title = 'Добавление товара'; ?>


<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($product, 'name')?>

<?= $form->field($product, 'img') -> fileInput()?>

<?= $form -> field($product, 'description') ->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]); ?>

<?= $form->field($product, 'vendor_code') ?>

<?= $form->field($product, 'price') ?>


<?=$form->field($product, 'active')->dropDownList(['1' => 'Активный', '0' => 'Неактивный']); ?>


<button type="submit" class="btn btn-success">Добавить товар</button>

<? $form = ActiveForm::end(); ?>