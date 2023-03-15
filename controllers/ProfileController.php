<?php

namespace app\controllers;

use app\models\User;
use app\models\UserSearch;

use Yii;

class ProfileController extends \yii\web\Controller
{
    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}