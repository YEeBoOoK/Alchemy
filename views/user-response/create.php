<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserResponse $model */

$this->title = 'Create User Response';
$this->params['breadcrumbs'][] = ['label' => 'User Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-response-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
