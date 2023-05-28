<?php

namespace app\controllers;

use app\models\Level;
use app\models\LevelAnswer;
use app\models\UserResponse;
use app\models\UserResponseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use yii\base\Request;

use Yii;

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

    public function beforeAction($action){
        if ($action->id=='create') $this->enableCsrfValidation=false;
        return parent::beforeAction($action);
    }

    /**
     * Creates a new UserResponse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $user_id = Yii::$app->user->identity->id_user;
        $level_id = Yii::$app->request->post('level_id');
        $level = Level::findOne($level_id);

        $newResponse=Yii::$app->request->post('response');
        
        if (!$level) return false;
        
        $models = UserResponse::find()->where(['level_id' => $level_id, 'user_id' => $user_id]) -> all();
        $correctAnswers = LevelAnswer::find()->where(['level_id' => $level_id])->all();
        
        if ($models === null) return false;

        $is_correct = 0;

        // проверяем, существует ли ответ в базе данных
        foreach ($correctAnswers as $correctAnswer) {
            if ($newResponse === $correctAnswer->answer) {
                $model = new UserResponse();
                $model->user_id = $user_id;
                $model->level_id = $level_id;
                $model->response = $newResponse;
                $model->is_correct = 1;

                if (!$model->save()) {
                    return false; // Если не удалось сохранить модель, возвращаем false
                }

                $is_correct = 1;
                break;
            }
    }

    return json_encode(['is_correct' => $is_correct]);
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
