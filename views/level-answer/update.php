<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LevelAnswer $model */

$this->title = 'Редактировать ответ: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ответы на уровни', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="level-answer-update bg-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
