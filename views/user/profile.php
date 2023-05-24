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

$this->title = 'Alchemy CSS — Профиль';
$this->params['breadcrumbs'][] = 'Профиль';
?>
<div class="user-index">

    <h1 class="mb-3">Профиль</h1>

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
                            <td class="user-data">Email:</td>
                            <td class="user-data">'.$user->email.'</td>
                        </tr>

                        <tr>
                            <th scope="row"></th>
                            <td class="user-data">Статус:</td>
                            <td class="user-data">'; 

                                if (!$models) {
                                    echo 'Завтра начну (статус изменится)</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                    </div>';
                                    return false;
                                }
                                
                                $lastLevel = 0;

                                foreach ($models as $model) {
                                    if ($model->is_correct == 1 && $model->level_id > $lastLevel) {
                                        $lastLevel = $model->level_id;
                                    }
                                }

                                if ($lastLevel >= 1 && $lastLevel < 3) {
                                    echo 'Помощник</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                    </div>';
                                } else if ($lastLevel > 3 && $lastLevel <= 7) {
                                    echo 'Маг Утренней Звезды</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                    </div>';
                                } else if ($lastLevel > 7 && $lastLevel <= 12) {
                                    echo 'Маг Сияющей Луны</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                    </div>';
                                } else if ($lastLevel > 12 && $lastLevel <= 15) {
                                    echo 'Монарх Рассветной зари</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                    </div>';
                                } else if ($lastLevel > 15 && $lastLevel <= 20) {
                                    echo 'Существо законов</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                    </div>';
                                }
                                    
                echo ' 
                </div>
        </div>';
    }

    ?>

</div>