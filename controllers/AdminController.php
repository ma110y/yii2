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



class AdminController extends Controller {

    public function actionIndex(){ // экшен главной страницы админки
        return $this -> render('index'); // рендерим вьюшку
    }

    public function actionSlider(){ // экшен для работы с добавлением фото и описаня к слайдеру

        $slider = Slider::find() -> all(); // берем все данные из таблицы со слайдером


        $post = new SliderForm(); // новый объект



        if ($post->load(Yii::$app->request->post()) && $post->validate() ) { // проверяем на загрузку из пост и на валидацию



            $post->img = UploadedFile::getInstance($post, 'img'); // загружаем картинку на сервер
            $post->img->saveAs('slider/'.$post->img->baseName.'.'.$post->img->extension.'');

            Image::thumbnail('@webroot/slider/'.$post->img->baseName.'.'.$post->img->extension.'', 650, 350)
                ->save(Yii::getAlias('@webroot/slider/'.$post->img->baseName.'.'.$post->img->extension.''), ['quality' => 80]);
            // изменяем размеры картинки ^^

            $post->save(); // сохраняем в БД

            Yii::$app -> session -> setFlash('success', 'Данные сохранены'); // запись в сессию что данные сохранены

            return $this -> refresh(); //перезагружаем страницу что бы не остались введенные данные и при обновлении страницы не спрашивало поаторить запрос

        }


        $query = Slider::find();

        $countQuery = clone $query;


        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 3]);

        $pages->pageSizeParam = false;
        $slider = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();




        return $this -> render('slider', compact('post','slider', 'pages')); // рендерим вьюшку
    }

    public function actionText(){ // вьюшка для админки

            $post = new TxtForm();

            if($post -> load(Yii::$app -> request -> post()) && $post -> validate()){ // проверка загрузки и валидация

                TxtForm::deleteAll(); // Удаляем ранее добавленный текст

                $post -> save(); // сохраняем новый

                Yii::$app -> session -> setFlash('success','Данные сохранены'); // сообщение что сохранили успешно

                return $this -> refresh(); //перезагружаем страницу что бы не остались введенные данные и при обновлении страницы не спрашивало поаторить запрос
            }

            $txt = TxtForm::getLast();

        return $this -> render('text', compact('post', 'txt'));
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


            if ($slider -> load(Yii::$app -> request -> post()) && $slider -> validate()) {

                $slider->img = UploadedFile::getInstance($slider, 'img'); // загружаем картинку на сервер
                $slider->img->saveAs('slider/'.$slider->img->baseName.'.'.$slider->img->extension.'');

                Image::thumbnail('@webroot/slider/'.$slider->img->baseName.'.'.$slider->img->extension.'', 650, 350)
                    ->save(Yii::getAlias('@webroot/slider/'.$slider->img->baseName.'.'.$slider->img->extension.''), ['quality' => 80]);


                $slider -> save();
                Yii::$app->session->setFlash('success', 'Обновлено');
                return Yii::$app->response->redirect(['admin/slider']);
            }

        return $this -> render('update', compact('slider'));
    }





    public function actionTxtupdate($id){

        $txt = TxtForm::getOne($id);

        if($txt -> load(Yii::$app -> request -> post()) && $txt -> validate()){

            $txt -> save();

            Yii::$app -> session -> setFlash('success', 'Текст успешно изменен');
            return Yii::$app -> response -> redirect(['admin/text']);
        }


        return $this -> render('txtupdate', compact('txt'));

    }



}