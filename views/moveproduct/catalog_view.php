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



<? $this -> title = 'Подтвердите перемещение'; ?>



<div class="alert alert-success">
    Вы уверенны что хотите переместить товар <b><?=$product_name -> name?></b> в каталог <b><?=$catalog_name->name?></b>
</div>

<a href="<?=Url::to(['moveproduct/confirm', 'id_catalog'=>$catalog_name->id, 'id_product'=>$product_name->id])?>" class="btn btn-primary">
    Да
</a>

<a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-primary">
    Нет
</a>