<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserResponse $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-response-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'level_id')->textInput() ?>

    <?= $form->field($model, 'response')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_correct')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn butt']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
