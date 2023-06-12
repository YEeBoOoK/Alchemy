<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Level $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="level-form">

    <?php $form = ActiveForm::begin(); 
    // $li=[]; $properties=\app\models\Property::find()->all();
    // foreach ($properties as $property)
    // {
    //     $li[$property->id_property]=$property->name_property;
    // }
    $li = [];
    $properties = \app\models\Property::find()->all();
    $li[null] = ''; // Добавляем пустое значение в массив
    foreach ($properties as $property) {
        $li[$property->id_property] = $property->name_property;
    }
    ?>
    
    <?= $form->field($model, 'name_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instruction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'property_id')->dropDownList($li) ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'earlier')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'after')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'winClass')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn butt']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
