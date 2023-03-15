<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Level $model */

$this->title = 'Update Level: ' . $model->id_level;
$this->params['breadcrumbs'][] = ['label' => 'Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_level, 'url' => ['view', 'id_level' => $model->id_level]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
