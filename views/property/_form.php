<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Property $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_property')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'definition')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn butt']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
