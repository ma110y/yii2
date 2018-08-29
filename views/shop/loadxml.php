<?php

use app\models\ShopForm;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;

$file = $_SERVER['DOCUMENT_ROOT'].'/web/xml/import.xml';
$xml = simplexml_load_file($file);
$json = json_encode($xml);
$data = json_decode($json,TRUE);




foreach($data as $item) {
$count_for = count($item['Товары']['Товар']);
for($i=0; $i<$count_for; $i++){
echo $item['Товары']['Товар'][$i]['Ид']." - ";
echo $item['Товары']['Товар'][$i]['Наименование']."-";
echo $item['Товары']['Товар'][$i]['Описание']."";

echo "<br>";


}

}


//foreach($data as $item) {
//$count_for = count($item['Категории']['Категория']);
//for($i=0; $i<$count_for; $i++){
//echo $item['Категории']['Категория'][$i]['Ид']." - ";
//echo $item['Категории']['Категория'][$i]['Наименование']."";
//if(isset($item['Категории']['Категория'][$i]['Свойства']))echo $item['Категории']['Категория'][$i]['Свойства']['Ид'];
//echo "<br>";
//}
//
//}

?>
<pre>
    <?=var_dump($data)?>
</pre>
