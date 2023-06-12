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

    <?php
    
    $id_user = Yii::$app->user->identity->id_user;

    $users = User::find()->where(['id_user' => $id_user])->all();
    
    $models = UserResponse::find()->where(['user_id' => $id_user]) -> all();
    

    foreach ($users as $user) {
        echo '<div class="row  py-2 user-data-bg">

                <div class="col-lg-6 photo-alignment">
                    <img class="user-photo" src="'.Html::encode($user->photo).'" alt="Ваше фото">
                </div>

                <div class="col-lg-6 pt-2"> 
                    <table class="table table-borderless">

                        <tr>
                            <th scope="row"></th>
                            <td class="user-data">Username:</td>
                            <td class="user-data">'.Html::encode($user->username).'</td>
                        </tr>

                        <tr>
                            <th scope="row"></th>
                            <td class="user-data">Email:</td>
                            <td class="user-data">'.Html::encode($user->email).'</td>
                        </tr>

                        <tr>
                            <th scope="row"></th>
                            <td class="user-data">Статус:</td>
                            <td class="user-data" title="*Проходите уровни, чтобы сменить статус!">'; 

                                if (!$models) {
                                    echo 'Архимаг Лени*</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100 mb-2" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                        <a class="btn btn-danger w-100" href="/user/delete?id_user='.$id_user.'" onclick="return confirm(\'Вы уверены, что хотите удалить профиль?\')">Удалить профиль</a>
                                    </div></div></div></div>';
                                    return false;
                                }
                                
                                $lastLevel = 0;

                                foreach ($models as $model) {
                                    if ($model->is_correct == 1 && $model->level_id >= $lastLevel) {
                                        $lastLevel = $model->level_id;
                                    }
                                }

                                if ($lastLevel > 0 && $lastLevel < 2) {
                                    echo 'Мастер Иллюзий</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100 mb-2" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                        <a class="btn btn-danger w-100" href="/user/delete?id_user='.$id_user.'">Удалить профиль</a>
                                    </div>';
                                } else if ($lastLevel > 1 && $lastLevel < 3) {
                                    echo 'Маг Хитрых Перевоплощений</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100 mb-2" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                        <a class="btn btn-danger w-100" href="/user/delete?id_user='.$id_user.'">Удалить профиль</a>
                                    </div>';
                                } else if ($lastLevel > 2 && $lastLevel < 4) {
                                    echo 'Профессор Пузырьковых Экспериментов</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100 mb-2" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                        <a class="btn btn-danger w-100" href="/user/delete?id_user='.$id_user.'">Удалить профиль</a>
                                    </div>';
                                } else if ($lastLevel > 3 && $lastLevel < 5) {
                                    echo 'Маг Хронически Запутанных Кабелей</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100 mb-2" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                        <a class="btn btn-danger w-100" href="/user/delete?id_user='.$id_user.'">Удалить профиль</a>
                                    </div>';
                                } else if ($lastLevel > 4 && $lastLevel < 6) {
                                    echo 'Существо законов</td></tr></table>
                                    <div class="text-center">
                                        <a class="update-btn w-100 mb-2" href="/user/update?id_user='.$id_user.'">Редактировать</a>
                                        <a class="btn btn-danger w-100" href="/user/delete?id_user='.$id_user.'">Удалить профиль</a>
                                    </div>';
                                } 
                                    
                echo ' 
                </div>
        </div>';
    }

    ?>

</div>