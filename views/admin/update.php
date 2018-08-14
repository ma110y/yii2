<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap;
use app\models\Slider;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
?>

<? $this -> title = 'Работа со слайдером'; ?>




<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> <!-- создание формы -->

<?= $form -> field($slider, 'description')?> <!-- текстовое поле -->

<?= $form -> field($slider, 'img') -> fileInput();?> <!-- поле загрузки файла -->

<? $slider->time = date("Y-m-d G:i", $slider->time);; ?>
<?=$form -> field($slider, 'time')->widget(DateTimePicker::className(),[]) ; ?>


<?= Html::submitButton('Обновить', ['class' => 'btn btn-success']); ?> <!-- Кнопка -->


<? $form - ActiveForm::end(); ?> <!-- Конец формы -->

<br>
<a href="<?=Url::to(['admin/slider'])?>"><button class="btn-block">Назад</button></a>