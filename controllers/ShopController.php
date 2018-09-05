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


        $query = ShopForm::find() -> andWhere(['id_catalog' => 0]) ->andWhere(['id_catalog_second'=>'0']) ;

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

//        $product = ProductForm::find() -> where(['id_catalog_second' => '429c26e0-b5b9-11e4-8355-74d02b7dfd8c' ]) -> all();


        $catalog_name = ShopForm::getCatalogName($id);

        $catalog_add = new ShopForm();




        //пагинация для каталогов
        $query = ShopForm::find() -> andWhere(['id_catalog' => $id]) -> orWhere(['id_catalog_second' => $catalog_name->id_second]) ;
        $countQuery = $query;
        $pages_catalog = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $pages_catalog->pageSizeParam = false;
        $pages_catalog -> pageParam = 'page_catalog';
        $catalog = $query->offset($pages_catalog->offset)
            ->limit($pages_catalog->limit)
            ->all();
        /////////////////////////


        //пагинация для товаров
        $query2 = ProductForm::find() -> andWhere(['id_catalog' => $id])->orWhere(['id_catalog_second' => $catalog_name->id_second]) ;
        $countQuery2 = $query2;
        $pages_product = new Pagination(['totalCount' => $countQuery2->count(), 'pageSize' => 10]);
        $pages_product->pageSizeParam = false;
        $pages_product -> pageParam = 'page_product';
        $product = $query2->offset($pages_product->offset)
            ->limit($pages_product->limit)
            ->all();
        /////////////////////////




        if($catalog_add->load(Yii::$app->request->post()) && $catalog_add->validate()){

            $catalog_add -> id_catalog = $id;

            $catalog_add -> save();

            Yii::$app->session->setFlash('success','Подкаталог добавлен');

            return Yii::$app -> response -> redirect(['shop/view_catalog', 'id' => $id]);
                
        }


        return $this -> render('view_catalog', compact('catalog', 'pages_catalog','pages_product','catalog_add','catalog_name','product'));
    }


    public function actionProduct($id){


        $catalog_name = ShopForm::find() -> where(['id' => $id ])->one();

        $catalog_name_prev = ShopForm::find() -> where(['id' => $catalog_name->id_catalog ])->one();
        if(!isset($catalog_name_prev))$catalog_name_prev = ShopForm::find() -> where(['id_second' => $catalog_name->id_catalog_second ])->one();

        $product = ProductForm::find()
            -> where(['id_catalog' => $id ])
            -> orWhere(['id_catalog_second' => $catalog_name->id_second])
            -> all();


//        echo var_dump($catalog_name_prev); die();


        $query = ProductForm::find()
            -> where(['id_catalog' => $id ])
            -> orWhere(['id_catalog_second' => $catalog_name->id_second]);

        $countQuery = $query;


        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

        $pages->pageSizeParam = false;
        $product = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this -> render('product', compact('product','pages','catalog_name','catalog_name_prev'));
    }


    public function actionProduct_add(){

        $product = new ProductForm();

        $id_catalog = Yii::$app->request->get('id_catalog');

        $product -> load(Yii::$app->request->post());

        if(!isset($product->time)) $product->time = time();

        if($product->validate()){


            $product -> img = UploadedFile::getInstance($product, 'img');

            if(isset($product->img)) {

                $product->img->saveAs('product/' . $product->img->baseName . '.' . $product->img->extension . '');

            } else {
                Yii::$app->session->setFlash('error', 'Необходимо добавить картинку');
                return $this -> refresh();
            }

            $product->id_catalog = $id_catalog;



            $product -> save();

            Yii::$app->session->setFlash('success', 'Товар добавлен');

            return Yii::$app->response->redirect(['shop/product_view', 'id' => $product->id]);

        }

        return $this -> render('product_add', compact('product'));
    }




    public function actionProduct_view($id){

        $product = ProductForm::getOne($id);

//        echo var_dump($product[0][id_catalog]); die();


        $catalog_name = ShopForm::find() -> where(['id' => $product[0]['id_catalog'] ])->one();
        if(!isset($catalog_name)){
            $catalog_name = ShopForm::find() -> where(['id_second' => $product[0]['id_catalog_second'] ])->one();
        }

//        echo var_dump($catalog_name); die();


        $catalog_name_prev = ShopForm::find() -> where(['id' => $catalog_name->id_catalog ])->one();
        if(!isset($catalog_name_prev)){
            $catalog_name_prev = ShopForm::find() -> where(['id_second' => $catalog_name->id_catalog_second ])->one();
        }



        return $this -> render('product_view', compact('product','catalog_name','catalog_name_prev'));

    }


    public function actionProduct_update($id){

        $product = ProductForm::getOneProduct($id);

        $catalog_name = ShopForm::find() -> where(['id' => $product->id_catalog ])->one();
        if(!isset($catalog_name)){
            $catalog_name = ShopForm::find() -> where(['id_second' => $product->id_catalog_second])->one();
        }

//        echo var_dump($catalog_name); die();


        $catalog_name_prev = ShopForm::find() -> where(['id' => $catalog_name->id_catalog ])->one();
        if(!isset($catalog_name_prev)){
            $catalog_name_prev = ShopForm::find() -> where(['id_second' => $catalog_name->id_catalog_second ])->one();
        }

        $img_name = $product->img;

        $change_catalog = ShopForm::find() -> all();

        if($product -> load(Yii::$app->request->post()) && $product->validate()){


            $timestamp = strtotime(''.$product->time.'');
            $product-> time = $timestamp;

//            echo var_dump($product); die();

            $product -> img = UploadedFile::getInstance($product, 'img');

            if($product->img) {
            $product->img->saveAs('product/'.$product->img->baseName.'.'.$product->img->extension.'');
            } else {
                $product->img = $img_name;
            }

            $product -> save();

            Yii::$app->session->setFlash('success', 'Товар изменет');

            return Yii::$app->response->redirect(['shop/product_view', 'id' => $product->id]);

        }

        return $this -> render('product_update', compact('product', 'change_catalog','catalog_name','catalog_name_prev'));

    }


    public function actionProduct_del(){
        $id = Yii::$app->request->get('id');

        $del = new ProductForm();

        $del = ProductForm::find()->where(['id' => $id])->one();

        $start_url =  \Yii::getAlias('@webroot');
        $file = $start_url.'/product/'.$del->img;
        if(file_exists($file)) {
            unlink('product/' . $del->img . '');
        }
        $id_catalog = $del -> id_catalog;

        $del -> delete();


        Yii::$app -> session -> setFlash('success', 'Тавар удален');

        return Yii::$app->response->redirect(''.$_SERVER['HTTP_REFERER'].'');
    }


    public function actionLoadxml()
    {
        $file = $_SERVER['DOCUMENT_ROOT'].'/web/xml/import.xml';
        $xml = simplexml_load_file($file);
        $json = json_encode($xml);
        $data = json_decode($json,TRUE);



        foreach($data as $item) {
            $count_for = count($item['Категории']['Категория']);
            for($i=0; $i<$count_for; $i++){
                $post = new ShopForm();
                $post -> name = $item['Категории']['Категория'][$i]['Наименование'];
                $post -> id_second = $item['Категории']['Категория'][$i]['Ид'];
                if(isset($item['Категории']['Категория'][$i]['Свойства'])){
                    $post->id_catalog_second =  $item['Категории']['Категория'][$i]['Свойства']['Ид'];
                } else {
                    $post->id_catalog_second = '0';
                }
                $post -> save(false);
            }
            }

        foreach($data as $item) {
            $count_for = count($item['Товары']['Товар']);
            for($i=0; $i<$count_for; $i++){
                $post = new ProductForm();
                $post -> id_second = $item['Товары']['Товар'][$i]['Ид'];
                $post -> name = $item['Товары']['Товар'][$i]['Наименование'];

                if($item['Товары']['Товар'][$i]['Артикул'] == Array()){
                    $post -> vendor_code = '';
                } else {
                    $post -> vendor_code = $item['Товары']['Товар'][$i]['Артикул'];
                }

                if($item['Товары']['Товар'][$i]['Описание'] == Array()){
                    $post -> description = 'Нет описания';
                } else {
                    $post -> description = $item['Товары']['Товар'][$i]['Описание'];
                }

                if(!isset($item['Товары']['Товар'][$i]['Картинка'])){
                    $post -> img = 'no_img';
                } else {
                    $post -> img = $item['Товары']['Товар'][$i]['Картинка'];
                }

                $post -> id_catalog_second = $item['Товары']['Товар'][$i]['Категория'];
                $post -> time = time();
                $post -> save(false);
            }
                }

            Yii::$app -> session -> setFlash('success', 'Данные из xml загруженны');

            return Yii::$app->response->redirect(['admin/index']);
        }


    public function actionUpdatexml()
    {
        $file = $_SERVER['DOCUMENT_ROOT'].'/web/xml/import.xml';
        $xml = simplexml_load_file($file);
        $json = json_encode($xml);
        $data = json_decode($json,TRUE);



        foreach($data as $item) {
            $count_for = count($item['Категории']['Категория']);
            for($i=0; $i<$count_for; $i++){
                $post = new ShopForm();
                $post -> name = $item['Категории']['Категория'][$i]['Наименование'];

                $query = ShopForm::find() -> where(['name' => $post->name])->one();
                if(count($query)==0) {
                    $post->id_second = $item['Категории']['Категория'][$i]['Ид'];
                    if (isset($item['Категории']['Категория'][$i]['Свойства'])) {
                        $post->id_catalog_second = $item['Категории']['Категория'][$i]['Свойства']['Ид'];
                    } else {
                        $post->id_catalog_second = '0';
                    }
                    $post->save(false);
                }
            }
        }

        foreach($data as $item) {
            $count_for = count($item['Товары']['Товар']);
            for($i=0; $i<$count_for; $i++){

                $product = ProductForm::find()-> where(['name' => $item['Товары']['Товар'][$i]['Наименование']]) -> one();

                if(count($product) == 0) {

                    $post = new ProductForm();
                    $post->id_second = $item['Товары']['Товар'][$i]['Ид'];
                    $post->name = $item['Товары']['Товар'][$i]['Наименование'];

                    if ($item['Товары']['Товар'][$i]['Артикул'] == Array()) {
                        $post->vendor_code = '';
                    } else {
                        $post->vendor_code = $item['Товары']['Товар'][$i]['Артикул'];
                    }

                    if ($item['Товары']['Товар'][$i]['Описание'] == Array()) {
                        $post->description = 'Нет описания';
                    } else {
                        $post->description = $item['Товары']['Товар'][$i]['Описание'];
                    }

                    if (!isset($item['Товары']['Товар'][$i]['Картинка'])) {
                        $post->img = 'no_img';
                    } else {
                        $post->img = $item['Товары']['Товар'][$i]['Картинка'];
                    }

                    $post->id_catalog_second = $item['Товары']['Товар'][$i]['Категория'];
                    $post->time = time();
                    $post->save(false);
                } else {

                    if ($item['Товары']['Товар'][$i]['Артикул'] == Array()) {
                        $product->vendor_code = '';
                    } else {
                        $product->vendor_code = $item['Товары']['Товар'][$i]['Артикул'];
                    }

                    if ($item['Товары']['Товар'][$i]['Описание'] == Array()) {
                        $product->description = 'Нет описания';
                    } else {
                        $product->description = $item['Товары']['Товар'][$i]['Описание'];
                    }

                    if (!isset($item['Товары']['Товар'][$i]['Картинка'])) {
                        $product->img = 'no_img';
                    } else {
                        $product->img = $item['Товары']['Товар'][$i]['Картинка'];
                    }

                    if($item['Товары']['Товар'][$i]["@attributes"]["Статус"] == "Удален"){
                        $product->active = '0';
                    }

                    $product->id_catalog_second = $item['Товары']['Товар'][$i]['Категория'];
                    $product->time = time();
                    $product->save(false);
                }
            }
        }

        Yii::$app -> session -> setFlash('success', 'Данные из import.xml обновлены');

        return Yii::$app->response->redirect(['admin/index']);
    }



    public function actionUpdateoffersxml() {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/web/xml/offers.xml';
        $xml = simplexml_load_file($file);
        $json = json_encode($xml);
        $data = json_decode($json, TRUE);




        foreach ($data as $item) {
            $count_for = count($item["Предложения"]["Предложение"]);
            for ($i = 0; $i < $count_for; $i++) {

                $product = ProductForm::find()-> where(['id_second' => $item["Предложения"]["Предложение"][$i]["Ид"]]) -> one();

                if(count($product)!=0){
                    $product -> price = $item["Предложения"]["Предложение"][$i]["Цены"]["Цена"]["ЦенаЗаЕдиницу"];
                    $product->save(false);
                }

                   }

        }

        Yii::$app -> session -> setFlash('success', 'Данные из offers.xml обновлены');

        return Yii::$app->response->redirect(['admin/index']);


    }


}