<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Property $model */

$this->title = 'Редактирование синтаксиса';
// . $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Административная панель', 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = ['label' => 'Синтаксисы', 'url' => ['index?sort=-id_property']];
$this->params['breadcrumbs'][] = ['label' => $model->name_property, 'url' => ['view', 'id_property' => $model->id_property]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="property-update bg-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
