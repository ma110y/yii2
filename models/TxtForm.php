<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 06.08.2018
 * Time: 17:14
 */

namespace app\models;


use yii\db\ActiveRecord;

class TxtForm extends ActiveRecord {

    public static function tableName() { // имя таблицы
        return 'text';
    }

    public function attributeLabels(){ // имена лэйблов
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
        ];
    }

    public function rules() // правила валидации
    {
        return [
            [['title',text], required],
        ];
    }


    public static function getLast(){
        $text = self::find() -> orderBy(['id' => SORT_DESC]) -> limit(1) -> all() ;
        return $text;
    }


    public static function getOne($id){
        $txt = self::find() -> where(['id' => $id]) -> one();
        return $txt;
    }

}