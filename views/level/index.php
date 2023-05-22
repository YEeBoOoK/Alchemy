<?php

use app\models\Level;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LevelSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Уровни';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить уровень', ['create'], ['class' => 'btn butt']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_level',
            'name_level',
            'instruction:ntext',
            'property_id',
            //'class',
            //'class2',
            //'style',
            //'earlier:ntext',
            //'after:ntext',
            //'winClass',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Level $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_level' => $model->id_level]);
                 }
            ],
        ],
    ]); ?>


</div>
