<?php

namespace app\controllers;

use app\models\CorrectAnswer;
use app\models\CorrectAnswerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CorrectAnswerController implements the CRUD actions for CorrectAnswer model.
 */
class CorrectAnswerController extends Controller
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
     * Lists all CorrectAnswer models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CorrectAnswerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CorrectAnswer model.
     * @param int $id_answer Id Answer
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_answer)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_answer),
        ]);
    }

    /**
     * Creates a new CorrectAnswer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CorrectAnswer();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_answer' => $model->id_answer]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CorrectAnswer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_answer Id Answer
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_answer)
    {
        $model = $this->findModel($id_answer);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_answer' => $model->id_answer]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CorrectAnswer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_answer Id Answer
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_answer)
    {
        $this->findModel($id_answer)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CorrectAnswer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_answer Id Answer
     * @return CorrectAnswer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_answer)
    {
        if (($model = CorrectAnswer::findOne(['id_answer' => $id_answer])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
