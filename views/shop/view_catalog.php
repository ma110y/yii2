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


<?//
//echo "<pre>";
//echo var_dump($catalog);
//echo "<pre>";
//die();
//?>

<? $this -> title = 'Просмотр каталога'; ?>

<h2>Вы находитесь в "<?=$catalog_name->name?>"</h2>

<br>

<? $id = Yii::$app->request->get('id'); ?>

<a href="<?=Url::to(['shop/product_add', 'id_catalog' => $id])?>" class="btn btn-primary">Добавить товар </a>

<br>

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

<a href="<?=Url::to(['shop/index'])?>" class="btn btn-primary btn-block">К списку каталогов</a>
<br>


<? $form = ActiveForm::begin(); ?>

<?= $form->field($catalog_add, 'name')?>

<?=$form->field($catalog_add, 'active')->dropDownList(['1' => 'Активный', '0' => 'Неактивный']); ?>


<button type="submit" class="btn btn-success">Добавить</button>

<? $form = ActiveForm::end(); ?>
