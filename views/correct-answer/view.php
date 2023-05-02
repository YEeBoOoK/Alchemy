<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CorrectAnswer $model */

$this->title = $model->id_answer;
$this->params['breadcrumbs'][] = ['label' => 'Ответы', 'url' => ['index']];
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
                'confirm' => 'Вы уверены, что хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_answer',
            'answer:ntext',
        ],
    ]) ?>

</div>
