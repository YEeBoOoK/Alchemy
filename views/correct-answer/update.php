<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CorrectAnswer $model */

$this->title = 'Update Correct Answer: ' . $model->id_answer;
$this->params['breadcrumbs'][] = ['label' => 'Correct Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_answer, 'url' => ['view', 'id_answer' => $model->id_answer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="correct-answer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
