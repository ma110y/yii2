<?
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<table class="table">
<?
foreach ($catalog AS $cat){ ?>
    <tr>
        <td>
            <a href="<?=Url::to(['shop/view_catalog', 'id' => ''.$cat -> id.''])?>">
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

<? $form = ActiveForm::begin(); ?>

<?= $form->field($post, 'name')?>

<button type="submit" class="btn btn-success">Добавить</button>

<? $form = ActiveForm::end(); ?>
