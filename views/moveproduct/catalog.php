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



<? $this -> title = 'Просмотр каталога'; ?>

<? $id_product = Yii::$app->request->get('id_product'); ?>
<? $id_catalog = Yii::$app->request->get('id_catalog'); ?>


<h2>Вы находитесь в "<?=$catalog_name->name?>"</h2>

<br>

<a href="<?=Url::to(['moveproduct/confirm', 'id_catalog'=>$id_catalog, 'id_product'=>$id_product])?>" class="btn btn-primary">
    Переместить сюда
</a>

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
        </tr>
    <? }
    ?>
</table>



<?php
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>

<a href="<?=Url::to(['moveproduct/index', 'id_product' => $id_product ])?>" class="btn btn-danger btn-block">К списку каталогов</a>