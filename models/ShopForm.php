<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 22.08.2018
 * Time: 13:37
 */

namespace app\models;


use yii\db\ActiveRecord;

class ShopForm extends ActiveRecord {

    public static function tableName()
    {
        return 'shop_catalog';
    }


    public function attributeLabels() // название форм для ввода
    {
        return [
            'name' => 'Название каталога',
        ];
    }



    public function rules(){ // правила валидации
        return [
            ['name', 'required'],
        ];
    }


    public function getAll(){
        $catalog = ShopForm::find() -> where(['id_catalog' => 0 ]) -> all();
        return $catalog;
    }

    public function getOne($id){
        $catalog = ShopForm::find() -> where(['id' => $id ]) -> one();
        return $catalog;
    }


    public function getCatalog($id){
        $catalog = ShopForm::find() -> where(['id_catalog' => $id ])->all();
        return $catalog;
    }


}