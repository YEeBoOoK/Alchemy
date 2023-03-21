<?php

namespace app\controllers;

use app\models\Level;
use Yii;

class GameController extends \yii\web\Controller
{
    // public function actionIndex($id_level = null)
    // {
    //     $levels = Level::find()->all();
    //     return $this->render('index', [
    //         'levels' => $levels,
    //         'currentLevelId' => $id_level,
    //     ]);
    // }

    public function actionIndex()
    {
        $id_level = 1;
        $levels = Level::find()->all();
        return $this->render('index', [
            'levels' => $levels,
            'currentLevelId' => $id_level,
        ]);
    }

    public function actionCounter()
    {
        //Считает кол-во уровней
        $levels = Level::find()->all();
        return Yii::$app->response->content = count($levels);
    }
}
