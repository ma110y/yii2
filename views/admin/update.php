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

<?php
echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]);

?>
<a href="/web/slider/<?=$slider->img?>" rel="fancybox"><img src="/web/slider/<?=$slider->img?>" height="60px"></a>
<?= $form -> field($slider, 'img') -> fileInput();?> <!-- поле загрузки файла -->

<? $slider->time = date("Y-m-d G:i", $slider->time);; ?>
<?=$form -> field($slider, 'time')->widget(DateTimePicker::className(),[]) ; ?>


<?= Html::submitButton('Обновить', ['class' => 'btn btn-success']); ?> <!-- Кнопка -->


<? $form - ActiveForm::end(); ?> <!-- Конец формы -->

<br>
<a href="<?=Url::to(['admin/slider'])?>"><button class="btn-block">Назад</button></a>