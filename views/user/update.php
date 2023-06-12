<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use app\models\User;


/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Редактирование профиля';
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['profile']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id_user' => Html::encode($model->id_user)]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>

<div class="user-update bg-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn butt mb-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
