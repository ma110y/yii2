<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use kartik\datetime\DateTimePicker;
?>

<? $this -> title = 'Добавление новой картинки'; ?>

<h3>Добавить новую картинку:</h3>


<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> <!-- создание формы -->

<?= $form -> field($post, 'description')?> <!-- текстовое поле -->

<?= $form -> field($post, 'img') -> fileInput();?> <!-- поле загрузки файла -->

<?=$form -> field($post, 'time')->widget(DateTimePicker::className(),[]); ?>


<?= Html::submitButton('Добавить', ['class' => 'btn btn-success']); ?> <!-- Кнопка -->


<? $form - ActiveForm::end(); ?> <!-- Конец формы -->

<br>

<a href="<?=Url::to(['admin/slider'])?>"><button class="btn-block">Вернуться к списку фотографий</button></a>