<?
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
use app\models\ShopForm;
?>

<?
if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов
?>



<? $this -> title = 'Изменение товара'; ?>

<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($product, 'name')?>

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
<a href="/web/product/<?=$product -> img?>" rel="fancybox">
    <img src="/web/product/<?=$product->img?>" height="70px"></a>
<?= $form->field($product, 'img') -> fileInput()?>

<?= $form -> field($product, 'description') ->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]); ?>

<?= $form->field($product, 'vendor_code') ?>

<?= $form->field($product, 'price') ?>


<? $product->time = date("Y-m-d G:i", $product->time);; ?>
<?=$form -> field($product, 'time')->widget(DateTimePicker::className(),[]) ; ?>


<?=$form->field($product, 'active')->dropDownList(['1' => 'Активный', '0' => 'Неактивный']); ?>

<a href="<?=Url::to(['moveproduct/index','id_product' => $product->id])?>" class="btn btn-danger">Переместить товар</a>
<br>
<br>
    <button type="submit" class="btn btn-success">Изменить товар</button>

<? $form = ActiveForm::end(); ?>
<br>
<a href="<?=Url::to(['shop/product', 'id' => $product->id_catalog])?>" class="btn btn-danger btn-block">Назад</a>
