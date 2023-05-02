<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LevelSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="level-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_level') ?>

    <?= $form->field($model, 'name_level') ?>

    <?= $form->field($model, 'instruction') ?>

    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'board') ?>

    <?php // echo $form->field($model, 'class') ?>

    <?php // echo $form->field($model, 'class2') ?>

    <?php // echo $form->field($model, 'selector') ?>

    <?php // echo $form->field($model, 'style') ?>

    <?php // echo $form->field($model, 'earlier') ?>

    <?php // echo $form->field($model, 'after') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
