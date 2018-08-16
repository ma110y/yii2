<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="/web/css/style.css" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>

<?php
//NavBar::begin([
//    'brandLabel' => Yii::$app->name,
//    'brandUrl' => Yii::$app->homeUrl,
//    'options' => [
//        'class' => 'top_menu',
//    ],
//]);
//echo Nav::widget([
//    'options' => ['class' => 'navbar-nav navbar-right'],
//    'items' => [
//        ['label' => 'Home', 'url' => ['/site/index']],
////        ['label' => 'About', 'url' => ['/site/about']],
////        ['label' => 'Contact', 'url' => ['/site/contact']],
//
//
//
//        // добавляем ссылку "Регистрация" и если авторизованный админ - выводим ссылку на админку
//        Yii::$app->user->isGuest ? (['label' => 'SignUp', 'url' => ['/site/signup']]) : (
//        Yii::$app->user->identity->role =='admin' ? (['label' => 'AdminPanel', 'url' => ['/admin']]) : ('')//вывод админки
//        ),
//
//        Yii::$app->user->isGuest ? (
//        ['label' => 'Login', 'url' => ['/site/login']]
//        ) : (
//            '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                'Logout (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>'
//        ),
//
//
//
//
//    ],
//]);
//?>
<!--<font class="top_menu_tel"> +123 45 678 90 11</font>-->
<?//
//NavBar::end();
//?>

<?=Html::beginForm(['/site/logout'], 'post')?>

<div class="top_menu">

    <a href="<?=Url::to(['/site/index'])?>"> Home </a>
    <a href="<?=Url::to(['/site/article'])?>"> Articles </a>
<!--    <a href="--><?//=Url::to(['/site/about'])?><!--">About</a>-->
<!--    <a href="--><?//=Url::to(['/site/contact'])?><!--">Contact</a>-->

    <?
    if(Yii::$app->user->isGuest) { ?>
        <a href="<?=Url::to(['/site/signup'])?>"> SignUp </a>
        <a href="<?=Url::to(['/site/login'])?>"> Login </a> <?

    } else {
                if(Yii::$app->user->identity->role =='admin'){ ?><a href="<?=Url::to(['/admin'])?>"> AdminPanel </a><? } ?>

        <button class="btn-link" style="color: #333333"> <?=Yii::$app->user->identity->username?> (LogOut) </button>
       <? }
    ?>


<font class="top_menu_tel"> <a href="tel:+123 45 678 90 11">+123 45 678 90 11</a></font>
<?=Html::endForm()?>

</div>






<?=$content?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
