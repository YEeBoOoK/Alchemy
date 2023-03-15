<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserResponse $model */

$this->title = $model->id_response;
$this->params['breadcrumbs'][] = ['label' => 'User Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-response-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_response' => $model->id_response], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_response' => $model->id_response], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_response',
            'user_id',
            'level_id',
            'response:ntext',
        ],
    ]) ?>

</div>
