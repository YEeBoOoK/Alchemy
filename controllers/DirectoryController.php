<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DirectoryController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionZindex()
    {
        return $this->render('zindex');
    }

    public function actionGridColumnStart()
    {
        return $this->render('grid-column-start');
    }
    
    public function actionGridColumnEnd()
    {
        return $this->render('grid-column-end');
    }
}