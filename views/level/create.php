<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Level $model */

$this->title = 'Добавить уровень';
$this->params['breadcrumbs'][] = ['label' => 'Уровни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-create bg-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
