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

<? $id_product = Yii::$app->request->get('id_product'); ?>
<? $id_catalog = Yii::$app->request->get('id_catalog'); ?>


<br>

<a href="<?=Url::to(['moveproduct/confirm', 'id_catalog'=>$id_catalog, 'id_product'=>$id_product])?>" class="btn btn-primary">
    Переместить сюда
</a>