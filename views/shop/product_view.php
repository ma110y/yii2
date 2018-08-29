<?
use yii\helpers\Url;
?>

<?
if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов
?>


<? $prod =  (array) $product; ?>

<? $this -> title = 'Просмотр товара'; ?>

<div class="btn-group">
    <div class="btn btn-primary">Путь:</div>


    <a href="<?=Url::to(['shop/index'])?>" class="btn btn-danger">
        /
    </a>


    <? if(isset($catalog_name_prev)){ ?>
    <a href="<?=Url::to(['shop/view_catalog', 'id' => $catalog_name_prev->id])?>" class="btn btn-danger">
        <?=$catalog_name_prev->name?>
    </a>
    <? } ?>

    <a href="<?=Url::to(['shop/view_catalog', 'id' => $catalog_name->id])?>" class="btn btn-danger">
        <?=$catalog_name->name?>
    </a>

    <a href="<?=Url::to(['shop/product_view', 'id' => $prod[0]['id']])?>" class="btn btn-danger">
        <?=$prod[0]['name']?>
    </a>
</div>


<div class="panel panel-default">
    <!-- Default panel contents -->

    <div class="panel-heading"><h4 align="center"><?=$prod[0]['name']?></h4></div>

    <ul class="list-group">
        <li class="list-group-item" style="text-align: center">
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
            <a href="/web/product/<?=$prod[0]['img']?>" rel="fancybox">
                <img src="/web/product/<?=$prod[0]['img']?>" height="200px">
            </a>
        </li>

        <div class="panel-body">
            <p><b>Описание:</b> <?=$prod[0]['description']?></p>
        </div>

        <li class="list-group-item"><b>Артикул:</b> <?=$prod[0]['vendor_code']?> </li>

        <li class="list-group-item"><b>Цена: </b> <?=$prod[0]['price']?> </li>

        <li class="list-group-item"><b>Добавлен: </b> <?=date("m.d.y G:i", $prod[0]['time']);?> </li>

        <? if($prod[0]['active'] == 0){ ?>
            <li class="list-group-item"><b>Статус: </b> Неактивен </li>
        <? } ?>


    </ul>

    <br>


    <? if(!isset($catalog_name_prev)){ ?>
        <a href="<?=Url::to(['shop/view_catalog', 'id' => $catalog_name->id])?>" class="btn btn-danger btn-block">
            Назад
        </a>
    <? } else{ ?>

<a href="<?=Url::to(['shop/product', 'id' => $prod[0]['id_catalog']])?>" class="btn btn-danger btn-block">
    Назад
</a>
<? } ?>