<?php

use app\models\Property;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PropertySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Синтаксисы';
// $this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Административная панель', 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = 'Синтаксисы';
?>
<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить синтаксис', ['create'], ['class' => 'btn butt']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_property',
            'name_property',
            'definition:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Property $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_property' => $model->id_property]);
                 }
            ],
        ],
    ]); ?>


</div>
