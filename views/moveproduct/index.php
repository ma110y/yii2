<?
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<?
if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов
?>

<? $this -> title = 'Список каталогов'; ?>

<? $id_product = Yii::$app->request->get('id_product'); ?>


<h1>Выберите каталог</h1>

<table class="table">
    <?
    foreach ($catalog AS $cat){ ?>
        <tr>
            <td>
                <a href="<?=Url::to(['moveproduct/catalog', 'id_catalog' => ''.$cat -> id.'', 'id_product' =>$id_product])?>">
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
    'pagination' => $pages,
]);
?>

<a href="<?=Url::to(['shop/product_view', 'id' => $id_product ])?>" class="btn btn-danger btn-block">Назад к товару</a>