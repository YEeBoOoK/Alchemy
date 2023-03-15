<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Level $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="level-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instruction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'property_id')->textInput() ?>

    <?= $form->field($model, 'board')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'selector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'style')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'earlier')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'after')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
