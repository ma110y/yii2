<?

use yii\helpers\Url;
use app\models\User;


$this -> title = 'Админка';

if(Yii::$app->user->identity->role != 'admin'){
    Yii::$app->response->redirect(Url::to('?'));
} // выкидываем неадминов

?>

<a href="<?=Url::to(['admin/slider']);?>">Работа со слайдером </a>
<br>
<a href="<?=Url::to(['admin/text']);?>">Работа с текстом </a>
<br>
<a href="<?=Url::to(['admin/article']);?>">Работа со статьями </a>
<br>
<a href="<?=Url::to(['shop/index']);?>">Работа с товарами </a>
<br>
<a href="<?=Url::to(['shop/loadxml']);?>">Загрузить из XML </a>
<br>
<a href="<?=Url::to(['shop/updatexml']);?>">Обновить из XML </a>
