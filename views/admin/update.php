<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap;
use app\models\Slider;
use yii\helpers\Url;

?>

<? $this -> title = 'Работа со слайдером'; ?>




<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> <!-- создание формы -->

<?= $form -> field($slider, 'description')?> <!-- текстовое поле -->

<?= $form -> field($slider, 'img') -> fileInput();?> <!-- поле загрузки файла -->

<?= Html::submitButton('Обновить', ['class' => 'btn btn-success']); ?> <!-- Кнопка -->


<? $form - ActiveForm::end(); ?> <!-- Конец формы -->