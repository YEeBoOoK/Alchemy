<?php

namespace app\controllers;

use app\models\Level;
use app\models\LevelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;

/**
 * LevelController implements the CRUD actions for Level model.
 */
class LevelController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['site/login']);
            return false;
        } 
        else return true;
    }
    
    /**
     * Lists all Level models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LevelSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Level model.
     * @param int $id_level Id Level
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_level)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_level),
        ]);
    }

    /**
     * Creates a new Level model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Level();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_level' => $model->id_level]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Level model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_level Id Level
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_level)
    {
        $model = $this->findModel($id_level);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_level' => $model->id_level]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Level model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_level Id Level
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_level)
    {
        $this->findModel($id_level)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Level model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_level Id Level
     * @return Level the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_level)
    {
        if (($model = Level::findOne(['id_level' => $id_level])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Lists all Level models.
     *
     * @return string
     */
    // public function actionGame($id_level)
    // {
    //     // $level = Yii::$app->request->get('id_level');
    //     $searchModel = new LevelSearch();
    //     $dataProvider = $searchModel->search($this->request->queryParams);

    //     return $this->render('game', [
    //         // 'levels' => $levels,
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionGame($id_level) 
    { 
        $searchModel = new LevelSearch(); 
        $dataProvider = $searchModel->search($this->request->queryParams); 

        return $this->render('game', [ 
            'searchModel' => $searchModel, 
            'dataProvider' => $dataProvider,
        ]); 
    }
}