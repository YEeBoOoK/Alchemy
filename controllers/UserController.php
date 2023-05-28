<?php

namespace app\controllers;

use app\models\RegForm;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
        if ((Yii::$app->user->isGuest) && ($action->id == 'profile')) {
            $this->redirect(['site/login']);
            return false;
        } 

        if ((Yii::$app->user->isGuest) && ($action->id == 'update')) {
            $this->redirect(['site/login']);
            return false;
        } 

        if ($action->id === 'index') {
            return $this->redirect(['site/login']);
        } else return true;
    }


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

    /**
     * Displays a single User model.
     * @param int $id_user Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RegForm();
        $time = time();

        if ($model->load($this->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            
            if ($model->photo !== null) {
                $model->photo->saveAs('web/UserPhoto/' . $model->photo->baseName . '_' .$time. '.' . $model->photo->extension);
                $model->photo=('/web/UserPhoto/' . $model->photo->baseName . '_' .$time. '.' . $model->photo->extension);
            } else {
                $model->photo=('/web/UserPhoto/UserImg.png');
            }

            // $model->passwordConfirm = $model->password;
            if ($model->validate()) {
                $user = new User();
                $user->photo = $model->photo;
                $user->email = $model->email;
                $user->username = $model->username;
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password); 
                // $user->passwordConfirm = \Yii::$app->getSecurity()->generatePasswordHash($model->password); 

                if ($user->save()) {
                    Yii::$app->user->login($user);
                    return $this->redirect(['/user/profile']);
                }
            }
            
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_user Id User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_user)
    {
        // $model = $this->findModel($id_user);
        // $user= Yii::$app->user->identity->id_user;

        // if ($model->id_user !== $user) {
        //     return $this->redirect('/update?id_user='.$user);
        // }
        // if (!$model->id_user) {
        //     return $this->redirect('/update?id_user='.$user);
        // }
        $model = User::findOne($id_user);
        $user = Yii::$app->user->identity->id_user;

        if (!$model) {
            return $this->redirect('/update?id_user='.$user);
        }

        if ($model->id_user !== $user) {
            return $this->redirect('/update?id_user='.$user);
        }

        $time = time();



        $userPhoto = $model->photo;
        $currentPassword = $model->password;
    
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');

            if ($model->photo !== null) {
                $model->photo->saveAs('web/UserPhoto/' . $model->photo->baseName . '_' .$time. '.' . $model->photo->extension);
                $model->photo=('/web/UserPhoto/' . $model->photo->baseName . '_' .$time. '.' . $model->photo->extension);
            } else {
                $model->photo = $userPhoto;
            }

            if ($model->password !== null) {
                // Хешируем новый пароль и сохраняем его в поле password
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
            } else {
                // Если пароль не был изменен, восстанавливаем текущий хэш пароля
                $model->password = $currentPassword;
            }

            if ($model->validate()) {
                $model->save(false);
            }
            
            return $this->redirect('profile');
        }

        $model->password = Yii::$app->security->validatePassword($currentPassword, $model->password) ? $model->password : '';
        // Устанавливаем расшифрованный пароль для отображения в поле формы
        // $model->password = Yii::$app->security->validatePassword($currentPassword, $model->password);
        // $model->password = '';

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_user Id User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_user)
    {
        $this->findModel($id_user)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_user Id User
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user)
    {
        if (($model = User::findOne(['id_user' => $id_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Профиль пользователя
    public function actionProfile()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('profile', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
