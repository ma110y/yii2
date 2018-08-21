<?//
//$file = $_SERVER['DOCUMENT_ROOT'].'/web/xml/import.xml';
//
//
//
//$xml2 = simplexml_load_file($file);
//
//
//
////
////$json = json_encode($xml);
////$arr = json_decode($json,true);
//
//
//
//
//
//foreach ($xml2 AS $abc){
//    $abc -> Классификатор->Группы -> Группа -> Ид;
//}
//
//echo "<pre>";
//echo var_dump($xml2);
//echo "</pre>";
//
//
//declare(strict_types=1);
//
///**
// * @param SimpleXMLElement $xml
// * @return array
// */
//
//function xmlToArray(SimpleXMLElement $xml)
//{
//    $parser = function (SimpleXMLElement $xml, array $collection = []) use (&$parser) {
//        $nodes = $xml->children();
//        $attributes = $xml->attributes();
//
//        if (0 !== count($attributes)) {
//            foreach ($attributes as $attrName => $attrValue) {
//                $collection['attributes'][$attrName] = strval($attrValue);
//            }
//        }
//
//        if (0 === $nodes->count()) {
//            $collection['value'] = strval($xml);
//            return $collection;
//        }
//
//        foreach ($nodes as $nodeName => $nodeValue) {
//            if (count($nodeValue->xpath('../' . $nodeName)) < 2) {
//                $collection[$nodeName] = $parser($nodeValue);
//                continue;
//            }
//
//            $collection[$nodeName][] = $parser($nodeValue);
//        }
//
//        return $collection;
//    };
//
//    return [
//        $xml->getName() => $parser($xml)
//    ];
//}
//
//$return = xmlToArray($xml2);
//
////
////
////foreach ($xml AS $rez) {
////    echo $rez -> Группы->Группа->Ид;
////}
//
//
////echo $rez[0] -> Группы->Группа->Ид;
//
////echo $rez[0]["Группы"]["Группа"]["Ид"];
////
//
//echo "<pre>";
//echo var_dump($return);
//echo "</pre>";
//
//
//
//
//?>
<?
$file = $_SERVER['DOCUMENT_ROOT'].'/web/xml/import.xml';
$xml = simplexml_load_file($file);

//
//$num = count ($xml->Группы->Группа);
//?><!--<hr>--><?//
//foreach ($xml AS $return){
//
//    echo $return;
//echo "1<br>";
//}
//
//?><!--<hr>--><?//
//
//$num = 4;
//// еще вариант - вынуть все данные из xml-файла: $num = count ($xml->NAME_STR); где NAME_STR - название блока данных
//
///* запускаем цикл */
//
//for ($i = 0; $i < $num; $i++)
//{
//    /* По умолчанию указанный ниже код будет дописывать в БД строчку с ID на 1 больше от последней записанной если мы хотим указать номера строк самостоятельно - вписываем свое значение вместо цифры 400: именно с этой цифры и начнется публикация. Помните, что если в указанных строках уже есть информация - новые данные будут перезаписаны поверху. */
//    $id = $i+400;
//    /* перед считыванием данных из xml - обнуляем переменные */
//    $date = ''; $index = ''; $name = ''; $title = ''; $image = '';
//    /* помещаем в переменные значения полей из xml файла */
//    $se = $xml->Группы->Группа->Наименование[$i];
//
//    echo $se.' - '.$i.'<br>';
//}

?><hr><?

$json = json_encode($xml);
$data = json_decode($json,TRUE);


?><h1>Группы</h1><?


foreach($data as $item) {
$count_for = count($item['Группы']['Группа']);
$count_for2 = count($item['Группы']['Группа'][--$count_for]['Группы']['Группа']);
    for($i=0; $i<$count_for; $i++){
        echo $item['Группы']['Группа'][$i]['Ид']." - ";
        echo $item['Группы']['Группа'][$i]['Наименование']." <br>";
    }

    for($i=0; $i<$count_for2; $i++){
        echo $item['Группы']['Группа'][$count_for]['Группы']['Группа'][$i]['Ид']." - ";
        echo $item['Группы']['Группа'][$count_for]['Группы']['Группа'][$i]['Наименование']."<br>";
    }
}


?><h1>Спарвочник</h1><?


foreach($data as $item) {
    $count_for = count($item['Свойства']['Свойство']);
    for($j = 0; $j<$count_for;$j++){
        $count_for2 = count($item['Свойства']['Свойство'][$j]);
    for($i=0; $i<$count_for2; $i++){
        echo $item['Свойства']['Свойство'][$j]["ВариантыЗначений"]['Справочник'][$i]['ИдЗначения']." - ";
        echo $item['Свойства']['Свойство'][$j]["ВариантыЗначений"]['Справочник'][$i]['Значение']." <br>";
    }
}}


?><h1>Категории</h1><?


foreach($data as $item) {
    $count_for = count($item['Категории']['Категория']);
    for($i=0; $i<$count_for; $i++){
        echo $item['Категории']['Категория'][$i]['Ид']." - ";
        echo $item['Категории']['Категория'][$i]['Наименование']." <br>";
    }

}




echo "<pre>";
echo var_dump($data);
echo "</pre>";



//foreach($data as $item) {
//
//    echo "<pre>";
//    echo print_r($item) ;
//    echo "<pre>";
//    echo "<hr>";
//    }
//
//
//
//
//
//
//echo "<pre>";
////echo var_dump($xml);
//echo "</pre>";
//


?>
