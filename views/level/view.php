<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Level $model */

$this->title = $model->id_level;
$this->params['breadcrumbs'][] = ['label' => 'Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="level-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_level' => $model->id_level], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_level' => $model->id_level], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
            'selector',
            'style:ntext',
            'earlier:ntext',
            'after:ntext',
        ],
    ]) ?>

</div>
