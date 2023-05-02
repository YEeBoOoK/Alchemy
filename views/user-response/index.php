<!-- !!!!!!!!!!!!!!!!!!!!!Наверное можно удалить!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<?php

use app\models\UserResponse;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserResponseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Responses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-response-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Response', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_response',
            'user_id',
            'level_id',
            'response:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UserResponse $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_response' => $model->id_response]);
                 }
            ],
        ],
    ]); ?>


</div>
