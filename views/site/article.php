<?
use yii\helpers\Url;
?>
<? $this -> title = 'Статьи'; ?>

<div class="row">

<?
foreach ($article as $return){ ?>
    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
        <div class="thumbnail">
            <img src="/web/article/<?=$return->img?>">
            <div class="caption">
                <h4 align="center"><a href="<?=Url::to(['/site/article_view','id' => ''.$return->id.''])?>"><?=$return->title?></a> </h4>
                <?=$return->discription?><br>
                <a class="btn btn-success" href="<?=Url::to(['/site/article_view','id' => ''.$return->id.''])?>">Подробнее</a>
            </div>
        </div>
    </div>
<? } ?>

</div>