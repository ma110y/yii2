<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 16.08.2018
 * Time: 23:40
 */

namespace app\models;


use yii\db\ActiveRecord;

class ArticleForm extends ActiveRecord {

    public static function tableName()
    {
        return 'article';
    }

    public function rules(){
        return [
            [['title', 'text', 'author', 'time', 'discription'], required],
            [['img'], 'file']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок статьи',
            'text' => 'Текст статьи',
            'img' => 'Превью',
            'time' => 'Время добавления',
            'author' => 'Автор',
            'discription' => 'Краткое описание'
        ];
    }

    public static function getOne($id){
        $article = self::find() -> where(['id' => $id]) -> one();
        return $article;
    }

}