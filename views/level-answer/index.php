<?php

use app\models\LevelAnswer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LevelAnswerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ответы на уровни';
$this->params['breadcrumbs'][] = ['label' => 'Административная панель', 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-answer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ответ', ['create'], ['class' => 'btn butt']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'level_id',
            ['attribute'=>'Название уровня', 'value'=> function($data){return $data->getLevel()->One()->name_level;}],
            'answer',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LevelAnswer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
