<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LevelAnswer $model */

$this->title = 'Добавить ответ уровню';
$this->params['breadcrumbs'][] = ['label' => 'Ответы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-answer-create bg-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
