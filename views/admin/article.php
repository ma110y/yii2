<?
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\datetime\DateTimePicker;
?>


<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

<?=$form -> field($post, 'title')?>

<?=$form -> field($post, 'text')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]); ?>

<?=$form->field($post, 'img') -> fileInput();?>

<?=$form -> field($post, 'author')?>

<?=$form -> field($post, 'time')->widget(DateTimePicker::className(),[]); ?>

<button class="btn btn-success" type="submit">Добавить</button>

<? $form = ActiveForm::end(); ?>