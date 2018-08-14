<?
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use mihaildev\ckeditor\CKEditor;
use kartik\datetime\DateTimePicker;
?>


<? $model = ActiveForm::begin(); ?>

<?= $model -> field($txt,'title') ?>

<?= $model -> field($txt, 'text') ->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]); ?>

<? $txt->time = date("Y-m-d G:i", $txt->time);; ?>
<?=$model -> field($txt, 'time')->widget(DateTimePicker::className(),[]) ; ?>


<button class="btn btn-success" type="submit">Изменить</button>

<? $model = ActiveForm::end(); ?>

<br>

<a href="<?=Url::to(['admin/text'])?>"><button class="btn-block">Назад</button></a>