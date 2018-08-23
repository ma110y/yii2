<?
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<? $this -> title = 'Товары'; ?>


<? $id = Yii::$app->request->get('id'); ?>

<a href="<?=Url::to(['shop/product_add', 'id_catalog' => $id])?>" class="btn btn-primary">Добавить товар </a>

<div class="row">

        <?
        foreach ($product AS $prod){?>
    <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="/web/product/<?=$prod->img?>">
                <div class="caption">
                    <h3><?=$prod->name?></h3>
                    <p>Артикул: <?=$prod->vendor_code?></p>
                    <p>Цена: <?=$prod->price?>р.</p>
                    <p>
                        <a href="<?=Url::to(['shop/product_view', 'id' => ''.$prod->id.'' ])?>" class="btn btn-primary" role="button">Подробнее</a>
                        <span class="btn-group pull-right">
                        <a href="<?=Url::to(['shop/product_update', 'id'=>''.$prod->id.''])?>" class="btn btn-danger" role="button">Изменить</a>
                        <a href="<?=Url::to(['shop/product_del', 'id'=>''.$prod->id.''])?>" class="btn btn-danger" role="button">Удалить</a>
                        </span>
                    </p>
                </div>
            </div>
    </div>
        <? } ?>

    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>

</div>

<br>

<a href="<?=Url::to(['shop/index'])?>" class="btn btn-danger btn-block">
    К списку каталогов
</a>