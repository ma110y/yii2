<?
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
?>

<?
if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов
?>




<?//
//echo "<pre>";
//echo var_dump($catalog);
//echo "<pre>";
//die();
//?>


<? $this -> title = $catalog_name->name; ?>

<?
$start_url =  \Yii::getAlias('@webroot');



if (file_exists($filename)) {
    echo "Файл $filename существует";
} else {
    echo "Файл $filename не существует";
}?>

<?
$this->params['breadcrumbs'][] = array(
    'label'=> 'Админка',
    'url'=>Url::toRoute('/admin/')
);

$this->params['breadcrumbs'][] = array(
    'label'=> 'Список каталогов',
    'url'=>Url::to(['shop/index'])
);
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-xs-12">



        <? $id = Yii::$app->request->get('id'); ?>

        <a href="<?=Url::to(['shop/product_add', 'id_catalog' => $id])?>" class="btn btn-primary pull-right">Добавить товар </a>

    </div>



            <div class="col-xs-6">

        <h2>Список подкаталогов:</h2>

        <?
        if(count($catalog) == 0) { ?><div class="alert alert-danger">Нет подкаталогов</div><? }
        ?>

        <table class="table">
            <?
            foreach ($catalog AS $cat){ ?>
                <tr>
                    <td>
                        <a href="<?=Url::to(['shop/product', 'id' => ''.$cat -> id.''])?>">
                            <?=$cat->name?>
                                <? if($cat->active == 0){ echo' (Неактивен)'; } ?>
                        </a>
                    </td>

                    <td>
                        <a href="<?=Url::to(['shop/update', 'id' => ''.$cat -> id.''])?>">
                            <i class="glyphicon glyphicon-pencil" style="font-size: 150%"></i>
                        </a>
                        <a href="<?=Url::to(['shop/del', 'id' => ''.$cat -> id.''])?>">
                            <i class="glyphicon glyphicon-remove" style="font-size: 150%"></i>
                        </a>
                    </td>
                </tr>
            <? }
            ?>
        </table>



        <?php
        echo LinkPager::widget([
            'pagination' => $pages_catalog,
        ]);
        ?>

    </div>

    <div class="col-xs-6">

        <h2>Список товаров:</h2>

        <?
        if(count($product) == 0) { ?><div class="alert alert-danger">Нет товаров</div><? } else {
        ?>
        <table class="table">
            <tr>
                <td>
                    Id
                </td>
                <td>
                    Картинка
                </td>
                <td>
                    Название
                </td>
                <td>
                    Артикул
                </td>
                <td>
                    Цена
                </td>
                <td>
                    Управление
                </td>
            </tr>
            <?
            foreach ($product AS $prod){?>
                <tr>
                    <td>
                        <?=$prod->id?>
                    </td>

                    <td>
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
                        <? $file = $start_url.'/product/'.$prod->img; ?>
                        <? if(file_exists($file)){?>
                            <a href="/web/product/<?=$prod->img?>" rel="fancybox">
                                <img src="/web/product/<?=$prod->img?>" height="70px">
                            </a>
                        <? }else{ ?>
                            <a href="/web/product/no_photo.png" rel="fancybox">
                            <img src="/web/product/no_photo.png" height="70px">
                        <? } ?>
                    </td>

                    <td>
                        <a href="<?=Url::to(['shop/product_view', 'id' => ''.$prod->id.'' ])?>">
                            <?=$prod->name?>
                            <? if($prod->active == 0){ echo' (Неактивен)'; } ?>
                        </a>
                    </td>

                    <td>
                        <?=$prod->vendor_code?>
                    </td>

                    <td>
                        <?=$prod->price?>
                    </td>

                    <td>
                        <a href="<?=Url::to(['shop/product_update', 'id'=>''.$prod->id.''])?>"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="<?=Url::to(['shop/product_del', 'id'=>''.$prod->id.''])?>"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>



                </tr>
            <? } ?>

        </table>

        <?php
        echo LinkPager::widget([
            'pagination' => $pages_product,
        ]);
        ?>

        <? } // else если товары есть  ?>

    </div>

    <div class="col-xs-12">

        <a href="<?=Url::to(['shop/index'])?>" class="btn btn-primary btn-block">К списку каталогов</a>
        <br>


        <? $form = ActiveForm::begin(); ?>

        <?= $form->field($catalog_add, 'name')?>

        <?=$form->field($catalog_add, 'active')->dropDownList(['1' => 'Активный', '0' => 'Неактивный']); ?>


        <button type="submit" class="btn btn-success">Добавить</button>

        <? $form = ActiveForm::end(); ?>
    </div>
</div>
