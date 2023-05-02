<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CorrectAnswer $model */

$this->title = 'Редактировать ответ: ' . $model->id_answer;
$this->params['breadcrumbs'][] = ['label' => 'Ответы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_answer, 'url' => ['view', 'id_answer' => $model->id_answer]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="correct-answer-update bg-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
