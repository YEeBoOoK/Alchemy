<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CorrectAnswer $model */

$this->title = 'Добавить правильный ответ';
$this->params['breadcrumbs'][] = ['label' => 'Правильные ответы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correct-answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
