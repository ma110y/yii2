<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 22.08.2018
 * Time: 13:33
 */

namespace app\controllers;


use app\models\ShopForm;
use yii\web\Controller;
use Yii;
use yii\data\Pagination;
use app\models\ProductForm;
use yii\web\UploadedFile;

class ShopController extends Controller {

    public function actionIndex(){

        $post = new ShopForm();

        $catalog = ShopForm::getAll();


        $query = ShopForm::find() -> where(['id_catalog' => 0]) ;

        $countQuery = $query;


        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

        $pages->pageSizeParam = false;
        $catalog = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        if($post -> load(Yii::$app -> request -> post()) && $post -> validate()){


            $post -> save();

            Yii::$app -> session -> setFlash('success', 'Каталог добавлен');

            return  $this -> refresh();

        }

        return $this -> render('index', compact('post','catalog','pages'));

    }


    public function actionDel(){
        $id = Yii::$app->request->get('id');

        $del = new ShopForm();

        $del = ShopForm::find()->where(['id' => $id])->one();

        $del -> delete();


        Yii::$app -> session -> setFlash('success', 'Каталог удален');

        return Yii::$app->response->redirect(['shop/index']); // переадресация на страницу слайдера
    }


    public function actionUpdate($id){

        $catalog = ShopForm::getOne($id);

        if($catalog -> load(Yii::$app -> request -> post()) && $catalog -> validate()){

            $catalog -> save();

            Yii::$app -> session -> setFlash('success','Каталог изменен');


            if($catalog->id_catalog == 0) {
                return Yii::$app->response->redirect(['shop/index']);
            }else {
                return Yii::$app->response->redirect(['shop/view_catalog', 'id' => $catalog->id_catalog]);
            }
        }

        return $this -> render('update', compact('catalog'));

    }


    public function actionView_catalog($id){

        $catalog = ShopForm::getCatalog($id);

        $product = ProductForm::getall($id);

        $catalog_name = ShopForm::getCatalogName($id);

        $catalog_add = new ShopForm();



        $query = ShopForm::find() -> where(['id_catalog' => $id]) ;

        $countQuery = $query;


        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

        $pages->pageSizeParam = false;
        $catalog = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        if($catalog_add->load(Yii::$app->request->post()) && $catalog_add->validate()){

            $catalog_add -> id_catalog = $id;

            $catalog_add -> save();

            Yii::$app->session->setFlash('success','Подкаталог добавлен');

            return Yii::$app -> response -> redirect(['shop/view_catalog', 'id' => $id]);
                
        }


        return $this -> render('view_catalog', compact('catalog', 'pages','catalog_add','catalog_name','product'));
    }


    public function actionProduct($id){

        $product = ProductForm::getAll($id);

        $catalog_name = ShopForm::getCatalogName($id);

        $catalog_name_prev = ShopForm::getCatalogName($catalog_name->id_catalog);

        $query = ProductForm::find() -> where(['id_catalog' => $id]) ;

        $countQuery = $query;


        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

        $pages->pageSizeParam = false;
        $catalog = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this -> render('product', compact('product','pages','catalog_name','catalog_name_prev'));
    }


    public function actionProduct_add(){

        $product = new ProductForm();

        $id_catalog = Yii::$app->request->get('id_catalog');

        if($product -> load(Yii::$app->request->post()) && $product->validate()){


            $product -> img = UploadedFile::getInstance($product, 'img');
            $product->img->saveAs('product/'.$product->img->baseName.'.'.$product->img->extension.'');

            $product->id_catalog = $id_catalog;

            $product->time = time();

            $product -> save();

            Yii::$app->session->setFlash('success', 'Товар добавлен');

            return Yii::$app->response->redirect(['shop/product', 'id' => $id_catalog]);

        }

        return $this -> render('product_add', compact('product'));
    }




    public function actionProduct_view($id){

        $product = ProductForm::getOne($id);

        return $this -> render('product_view', compact('product'));

    }


    public function actionProduct_update($id){

        $product = ProductForm::getOneProduct($id);

        $catalog = ShopForm::find() -> where(['id_catalog' => 0])-> all();

        $img_name = $product->img;

        $change_catalog = ShopForm::find() -> all();

        if($product -> load(Yii::$app->request->post()) && $product->validate()){

            $timestamp = strtotime(''.$product->time.'');
            $product-> time = $timestamp;

            if($product->img) {
            $product -> img = UploadedFile::getInstance($product, 'img');
            $product->img->saveAs('product/'.$product->img->baseName.'.'.$product->img->extension.'');
            } else {
                $product->img = $img_name;
            }


            $product -> save();

            Yii::$app->session->setFlash('success', 'Товар изменет');

            return Yii::$app->response->redirect(['shop/product', 'id' => $product->id_catalog]);

        }

        return $this -> render('product_update', compact('product', 'change_catalog','catalog'));

    }


    public function actionProduct_del(){
        $id = Yii::$app->request->get('id');

        $del = new ProductForm();

        $del = ProductForm::find()->where(['id' => $id])->one();

        unlink('product/'.$del->img.'');

        $id_catalog = $del -> id_catalog;

        $del -> delete();


        Yii::$app -> session -> setFlash('success', 'Тавар удален');

        return Yii::$app->response->redirect(['shop/product', 'id' => $id_catalog]);
    }


    public function actionForma(){
        $catalog = ShopForm::find() -> where(['id_catalog' => 0])-> all();

        for($i=0; $i<count($catalog); $i++) {
            echo "<b>".$catalog[$i]['name'] . "</b><br>";
                $podcatalog = ShopForm::getCatalog($catalog[$i]['id']);
                    for($j=0; $j<count($podcatalog); $j++){
                        echo $podcatalog[$j]['name'] . "<br>";
                    }

        }

        echo "<pre>";
        echo var_dump($change_catalog);
        echo"</pre>";

    }



}