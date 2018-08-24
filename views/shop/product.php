<?
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<?
if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов
?>


<? $this -> title = 'Товары'; ?>


<? $id = Yii::$app->request->get('id'); ?>

<h2>Вы находитесь в "
    <a href="<?=Url::to(['shop/view_catalog','id' => $catalog_name_prev->id])?>">
        <?=$catalog_name_prev->name?>
    </a>
        /
    <a href="<?=Url::to(['shop/product','id' => $catalog_name->id])?>">
        <?=$catalog_name->name?>
    </a>
    "
</h2>

<br>
<a href="<?=Url::to(['shop/product_add', 'id_catalog' => $id])?>" class="btn btn-primary">Добавить товар </a>

<br>
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
             <a href="/web/product/<?=$prod->img?>" rel="fancybox">
                 <img src="/web/product/<?=$prod->img?>" height="70px">
             </a>
         </td>

         <td>
             <a href="<?=Url::to(['shop/product_view', 'id' => ''.$prod->id.'' ])?>">
                <?=$prod->name?>
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
        'pagination' => $pages,
    ]);
    ?>

</div>

<br>

<a href="<?=Url::to(['shop/index'])?>" class="btn btn-danger btn-block">
    К списку каталогов
</a>