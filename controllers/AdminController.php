<?php
/**
 * Created by PhpStorm.
 * User: Ma110Y
 * Date: 05.08.2018
 * Time: 19:36
 */

namespace app\controllers;


use app\models\TxtForm;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use app\models\SliderForm;
use app\models\Slider;
use app\models\ArticleForm;


class AdminController extends Controller {

    public function actionIndex(){ // экшен главной страницы админки
        return $this -> render('index'); // рендерим вьюшку
    }

    public function actionSlider(){ // экшен для работы с добавлением фото и описаня к слайдеру

        $slider = Slider::find() -> all(); // берем все данные из таблицы со слайдером





        $query = Slider::find();

        $countQuery = clone $query;


        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

        $pages->pageSizeParam = false;
        $slider = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();




        return $this -> render('slider', compact('post','slider', 'pages')); // рендерим вьюшку
    }

    public function actionText(){ // вьюшка для админки

            $post = new TxtForm();



            if($post -> load(Yii::$app -> request -> post()) && $post -> validate()){ // проверка загрузки и валидация

                $timestamp = strtotime(''.$post->time.'');

                $post-> time = $timestamp;

//                echo var_dump($post); die;

                TxtForm::deleteAll(); // Удаляем ранее добавленный текст

                $post -> save(); // сохраняем новый

                Yii::$app -> session -> setFlash('success','Данные сохранены'); // сообщение что сохранили успешно

                return $this -> refresh(); //перезагружаем страницу что бы не остались введенные данные и при обновлении страницы не спрашивало поаторить запрос
            }

            $txt = TxtForm::getLast();

        return $this -> render('text', compact('post', 'txt'));
    }





    public function actionAdd_img(){

        $post = new SliderForm(); // новый объект



        if ($post->load(Yii::$app->request->post()) && $post->validate() ) { // проверяем на загрузку из пост и на валидацию

            $timestamp = strtotime(''.$post->time.'');

            $post-> time = $timestamp;


            $post->img = UploadedFile::getInstance($post, 'img'); // загружаем картинку на сервер
            $post->img->saveAs('slider/'.$post->img->baseName.'.'.$post->img->extension.'');

            Image::thumbnail('@webroot/slider/'.$post->img->baseName.'.'.$post->img->extension.'', 650, 350)
                ->save(Yii::getAlias('@webroot/slider/'.$post->img->baseName.'.'.$post->img->extension.''), ['quality' => 80]);
            // изменяем размеры картинки ^^

            $post->save(); // сохраняем в БД

            Yii::$app -> session -> setFlash('success', 'Данные сохранены'); // запись в сессию что данные сохранены

            return $this -> refresh(); //перезагружаем страницу что бы не остались введенные данные и при обновлении страницы не спрашивало поаторить запрос

        }

        return $this -> render('add_img', compact('post')); // рендерим вьюшку


    }




    public function actionDel(){ // удаление
        $id = Yii::$app->request->get('id'); // берем ид из гет

        $del = new Slider; // новый объект

        $del = SliderForm::find()->where(['id' => $id])->one(); //вобрка из бд по нужному ид

        unlink('slider/'.$del->img.''); // удаляем картинку с сервера

        $del -> delete(); // удаляем запись из бд


        Yii::$app -> session -> setFlash('success', 'Данные удалены'); // в сессию сообщение что удалили

        return Yii::$app->response->redirect(['admin/slider']); // переадресация на страницу слайдера
    }


    public function actionUpdate($id){

        $slider = SliderForm::getOne($id);

        $img_name = $slider->img;

            if ($slider -> load(Yii::$app -> request -> post()) && $slider -> validate()) {

                $timestamp = strtotime(''.$slider->time.'');

                $slider-> time = $timestamp;


                $slider->img = UploadedFile::getInstance($slider, 'img'); // загружаем картинку на сервер


                if($slider->img) {

                    $slider->img->saveAs('slider/' . $slider->img->baseName . '.' . $slider->img->extension . '');

                    Image::thumbnail('@webroot/slider/' . $slider->img->baseName . '.' . $slider->img->extension . '', 650, 350)
                        ->save(Yii::getAlias('@webroot/slider/' . $slider->img->baseName . '.' . $slider->img->extension . ''), ['quality' => 80]);

                } else {
                    $slider->img = $img_name;
                }

                $slider -> save();

                Yii::$app->session->setFlash('success', 'Обновлено');
                return Yii::$app->response->redirect(['admin/slider']);
            }

        return $this -> render('update', compact('slider'));
    }





    public function actionTxtupdate($id){

        $txt = TxtForm::getOne($id);

        if($txt -> load(Yii::$app -> request -> post()) && $txt -> validate()){

            $timestamp = strtotime(''.$txt->time.'');

            $txt-> time = $timestamp;

            $txt -> save();

            Yii::$app -> session -> setFlash('success', 'Текст успешно изменен');
            return Yii::$app -> response -> redirect(['admin/text']);
        }


        return $this -> render('txtupdate', compact('txt'));

    }


    public function actionArticle(){

        $post = new ArticleForm();

        if($post -> load(Yii::$app -> request -> post()) && $post -> validate()){

            $time = strtotime($post->time);
            $post -> time = $time;


            $post -> img = UploadedFile::getInstance($post, 'img');
            $post -> img -> saveAs('article/'.$post->img->baseName.'.'.$post->img->extension.'');

            Image::thumbnail('@webroot/article/' . $post->img->baseName . '.' . $post->img->extension . '', 300, 90)
            ->save(Yii::getAlias('@webroot/article/' . $post->img->baseName . '.' . $post->img->extension . ''), ['quality' => 80]);


            $post -> save();

            Yii::$app -> session -> setFlash('success', 'Текст успешно добавлен');

            return Yii::$app -> response ->redirect(['admin/article']);
        }

        return $this -> render('article', compact('post'));
    }


}