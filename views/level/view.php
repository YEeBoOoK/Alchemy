<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Level $model */

$this->title = $model->id_level;
$this->params['breadcrumbs'][] = ['label' => 'Уровни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="level-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id_level' => $model->id_level], ['class' => 'btn butt']) ?>
        <?= Html::a('Удалить', ['delete', 'id_level' => $model->id_level], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_level',
            'name_level',
            'instruction:ntext',
            'property_id',
            'board',
            'class',
            'class2',
            'selector',
            'style',
            'earlier:ntext',
            'after:ntext',
            'winClass',
        ],
    ]) ?>

</div>
