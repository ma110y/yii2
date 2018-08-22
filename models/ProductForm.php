<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 22.08.2018
 * Time: 15:12
 */

namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class ProductForm extends ActiveRecord {

    public static function tableName()
    {
        return 'shop_product';
    }

    public function rules(){ // правила валидации
        return [
            [['name', 'description', 'vendor_code', 'price'], 'required'],
            [['img'], 'file'],
        ];
    }

    public function attributeLabels() // название форм для ввода
    {
        return [
            'name' => 'Название товара',
            'description' => 'Описание',
            'img' => 'Картинка',
            'vendor_code' => 'Артикул',
            'price' => 'Цена',
        ];
    }

    public function getAll($id){
        $product = ProductForm::find() -> where(['id_catalog' => $id ]) -> all();
        return $product;
    }


    public function getOne($id){
        $product = ProductForm::find()-> where(['id' => $id ]) -> all();
        return $product;
    }

    public function getOneProduct($id){
        $product = ProductForm::find()-> where(['id' => $id ]) -> one();
        return $product;
    }

}