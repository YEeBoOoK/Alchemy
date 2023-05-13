<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LevelAnswer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="level-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'level_id')->textInput() ?>

    <?= $form->field($model, 'answer')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn butt']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
