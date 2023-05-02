<!-- !!!!!!!!!!!!!!!!!!!!!Наверное можно удалить!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserResponse $model */

$this->title = 'Update User Response: ' . $model->id_response;
$this->params['breadcrumbs'][] = ['label' => 'User Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_response, 'url' => ['view', 'id_response' => $model->id_response]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-response-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
