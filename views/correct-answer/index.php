<?php

use app\models\CorrectAnswer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CorrectAnswerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ответы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correct-answer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ответ', ['create'], ['class' => 'btn butt']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_answer',
            'answer:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CorrectAnswer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_answer' => $model->id_answer]);
                 }
            ],
        ],
    ]); ?>


</div>
