<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 27.08.2018
 * Time: 18:10
 */

namespace app\controllers;

use app\models\ShopForm;
use yii\web\Controller;
use yii\data\Pagination;
use Yii;
use app\models\ProductForm;


class MoveproductController extends Controller {

    public function actionIndex(){

        $catalog = ShopForm::getAll();

        $query = ShopForm::find() -> where(['id_catalog' => 0]) ;

        $countQuery = $query;


        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

        $pages->pageSizeParam = false;
        $catalog = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this -> render('index', compact('catalog','pages'));
    }


    public function actionCatalog($id_catalog){

        $catalog = ShopForm::getCatalog($id_catalog);
        $catalog_name = ShopForm::getCatalogName($id_catalog);

        $query = ShopForm::find() -> where(['id_catalog' => $id_catalog]) ;

        $countQuery = $query;

        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

        $pages->pageSizeParam = false;
        $catalog = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this -> render('catalog', compact('catalog','catalog_name','pages'));

    }


    public function actionCatalog_view($id_catalog){

        $catalog = ShopForm::getCatalog($id_catalog);
        $catalog_name = ShopForm::getCatalogName($id_catalog);

        $query = ShopForm::find() -> where(['id_catalog' => $id_catalog]) ;

        $countQuery = $query;

        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

        $pages->pageSizeParam = false;
        $catalog = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this -> render('catalog_view', compact('catalog','catalog_name','pages'));

    }


    public function actionConfirm(){

        $id_product = Yii::$app->request->get('id_product');
        $id_catalog = Yii::$app->request->get('id_catalog');

        $product = ProductForm::getOneProduct($id_product);

//        echo var_dump($product); die();

        $product-> id_catalog = $id_catalog;

        $product -> save();

        Yii::$app->session->setFlash('success', 'Товар перемещен');

        return Yii::$app->response->redirect(['shop/product_view', 'id' => $id_product]);

//        return $this -> render('confirm');
    }

}