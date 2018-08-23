<?
use yii\helpers\Url;
?>

<? $prod =  (array) $product; ?>

<? $this -> title = 'Просмотр товара'; ?>


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

    </ul>

    <br>

<a href="<?=Url::to(['shop/product', 'id' => $prod[0]['id_catalog']])?>" class="btn btn-danger btn-block">
    Назад
</a>
