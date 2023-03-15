<?php

namespace app\controllers;

use app\models\UserResponse;
use app\models\UserResponseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserResponseController implements the CRUD actions for UserResponse model.
 */
class UserResponseController extends Controller
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

    /**
     * Lists all UserResponse models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserResponseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserResponse model.
     * @param int $id_response Id Response
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_response)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_response),
        ]);
    }

    /**
     * Creates a new UserResponse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserResponse();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_response' => $model->id_response]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserResponse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_response Id Response
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_response)
    {
        $model = $this->findModel($id_response);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_response' => $model->id_response]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserResponse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_response Id Response
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_response)
    {
        $this->findModel($id_response)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserResponse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_response Id Response
     * @return UserResponse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_response)
    {
        if (($model = UserResponse::findOne(['id_response' => $id_response])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
