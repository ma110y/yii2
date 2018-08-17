<h2 align="center"><?=$article->title?></h2>
<?=$article->text?>

<!---->
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-md-6">-->
<!--            <div class="tabs">-->
<!--                <ul class="nav nav-tabs">-->
<!--                    <li class="active"><a href="#tab-1" data-toggle="tab">Вкладка 1</a> </li>-->
<!--                    <li><a href="#tab-2" data-toggle="tab">Вкладка 2</a> </li>-->
<!--                    <li><a href="#tab-3" data-toggle="tab">Вкладка 3</a> </li>-->
<!--                </ul>-->
<!---->
<!--                <div class="tab-content">-->
<!---->
<!--                    <div class="tab-pane fade in active" id="tab-1">-->
<!--                        <p>Текст 1</p>-->
<!--                    </div>-->
<!--                    <div class="tab-pane fade " id="tab-2">-->
<!--                        <p>Текст 2</p>-->
<!--                    </div>-->
<!--                    <div class="tab-pane fade " id="tab-3">-->
<!--                        <p>Текст 3</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<div class="row">
    <div class="tabs">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#comments" data-toggle="tab">Комментарии</a></li>
            <li><a href="#author" data-toggle="tab">Автор</a></li>
            <li><a href="#time" data-toggle="tab">Время добвления</a></li>
            <? if(Yii::$app->user->identity->role = 'admin' ){ ?>
                <li><a href="#admin" data-toggle="tab">Управление</a></li>
            <? } ?>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="comments">
            Комменты
        </div>

        <div class="tab-pane fade" id="author">
            <?=$article->author?> <span class="badge">21</span>
        </div>

        <div class="tab-pane fade" id="time">
            <?=date("m.d.y G:i", $article->time);?>
        </div>

        <div class="tab-pane fade" id="admin">
            <div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></a>
                <a href="#" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="#" class="btn btn-success"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
    </div>
</div>

