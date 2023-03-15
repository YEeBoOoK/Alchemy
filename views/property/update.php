<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Property $model */

$this->title = 'Update Property: ' . $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_property, 'url' => ['view', 'id_property' => $model->id_property]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
