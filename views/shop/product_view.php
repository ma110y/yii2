<?
use yii\helpers\Url;
?>

<?
if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов
?>


<? $prod =  (array) $product; ?>

<? $this -> title = $product[0]['name']; ?>


<?
$this->params['breadcrumbs'][] = array(
    'label'=> 'Админка',
    'url'=>Url::toRoute('/admin/')
);

$this->params['breadcrumbs'][] = array(
    'label'=> 'Список каталогов',
    'url'=>Url::to(['shop/index'])
);

if(isset($catalog_name_prev)) {
    $this->params['breadcrumbs'][] = array(
        'label' => $catalog_name_prev->name,
        'url' => Url::to(['shop/view_catalog', 'id' => $catalog_name_prev->id])
    );
}


$this->params['breadcrumbs'][] = array(
    'label' => $catalog_name->name,
    'url' => Url::to(['shop/view_catalog', 'id' => $catalog_name->id])
);


$this->params['breadcrumbs'][] = $this->title;
?>


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




        <a onclick="javascript:history.back(); return false;" class="btn btn-danger btn-block">
            Назад
        </a>


