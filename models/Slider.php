<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 31.07.2018
 * Time: 16:29
 */

namespace app\models;


use yii\db\ActiveRecord;

class Slider extends ActiveRecord {

    public static function tableName() // берем название таблицы для вывода
    {
        return 'slider';
    }

}