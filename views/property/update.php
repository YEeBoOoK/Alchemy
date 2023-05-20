<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Property $model */

$this->title = 'Редактировать инструкцию: ' . $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Инструкции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_property, 'url' => ['view', 'id_property' => $model->id_property]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="property-update bg-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
