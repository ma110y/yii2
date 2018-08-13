<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 05.08.2018
 * Time: 21:24
 */

namespace app\models;


use yii\db\ActiveRecord;

class SliderForm extends ActiveRecord {

    public static function tableName(){ // название таблицы с данными о слайдере
        return 'slider';
    }

    public function attributeLabels() // название форм для ввода
    {
        return [
            'img' => 'Картинка',
            'description' => 'Описание:',
            'time' => 'Время добавления',
        ];
    }


    public function rules(){ // правила валидации
        return [
            [['description', 'time'], 'required'],
            [['img'], 'file'],
        ];
    }

    public static function getOne($id){
        $slider = self::find() -> where(['id' => $id]) -> one();
        return $slider;
    }

}