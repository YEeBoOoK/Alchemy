<?php

use app\models\User;
use app\models\UserResponse;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 

    $id_user = Yii::$app->user->identity->id_user;

    $users = User::find()->where(['id_user' => $id_user])->all();
    
    $models = UserResponse::find()->where(['user_id' => $id_user]) -> all();
    

    foreach ($users as $user) {
        echo '<div class="row  py-2 user-data-bg">
                <div class="col-lg-4 text-center">
                    <img class="user-photo" src="'.$user->photo.'" alt="Ваше фото">
                </div>
                <div class="col-lg-6 pt-2">
                    <table class="table table-borderless">

                        <tr>
                            <th scope="row"></th>
                            <td class="user-data">Username:</td>
                            <td class="user-data">'.$user->username.'</td>
                        </tr>

                        <tr>
                            <th scope="row"></th>
                            <td class="user-data">Email</td>
                            <td class="user-data">'.$user->email.'</td>
                        </tr>

                        <tr>
                            <th scope="row"></th>
                            <td class="user-data">Статус</td>
                            <td class="user-data">'; 

                                if (!$models) {
                                    echo 'Завтра начну</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                    </div>';
                                    return false;
                                }
                                
                                foreach ($models as $model) {
                                    if ($model->is_correct = 1) {
                                        if ($model->level_id <= 3) {
                                            echo 'Новичок</td></tr></table>
                                            <div class="text-center">
                                                <a class="update-btn w-100" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                            </div>';
                                            break;
                                        }
                                    }
                                }
                                    
                echo ' 
                </div>
        </div>';
    }

    ?>

</div>
