<?
use yii\bootstrap\Carousel;
use yii\helpers\Html;
?>

<!-- тест новой ветки -->

<div align="center">

<?


    $this -> title = 'Слайдер';

    $slider_info = []; //создаем массив
    $slider_count = 0; // счетчик для заполнения

    foreach ($slider as $return){ // заполняем массив данными из таблицы слайдера
        $slider_info[$slider_count]['content'] = '<img src="/web/slider/'.$return -> img.'"/>';
        $slider_info[$slider_count]['caption'] = '<h4>'.$return->description.'</h4>';
        $slider_count++;
    }



    echo Carousel::widget(['items' => $slider_info ]); // выводим слайдер


    ?>
</div>

<? foreach ($text as $txt){ ?>
    <div class="tltle_output_text">
        <?=Html::encode($txt -> title)?>
    </div>

    <div class="output_txt">
        <?= Html::encode($txt -> text) ?>
    </div>


<? } ?>
