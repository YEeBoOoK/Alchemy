<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Level $model */

$this->title = 'Редактировать уровень: ' . $model->name_level;
$this->params['breadcrumbs'][] = ['label' => 'Административная панель', 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = ['label' => 'Уровни', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_level, 'url' => ['view', 'id_level' => $model->id_level]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="level-update bg-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
