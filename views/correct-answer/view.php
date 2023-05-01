<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CorrectAnswer $model */

$this->title = $model->id_answer;
$this->params['breadcrumbs'][] = ['label' => 'Correct Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="correct-answer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id_answer' => $model->id_answer], ['class' => 'btn butt']) ?>
        <?= Html::a('Удалить', ['delete', 'id_answer' => $model->id_answer], [
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
            'id_answer',
            'level_id',
            'answer:ntext',
        ],
    ]) ?>

</div>
