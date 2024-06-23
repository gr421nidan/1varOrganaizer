<?php

use app\models\Contact;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Meet $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="meet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contact_id')->dropDownList(ArrayHelper::map(Contact::find()->all(), 'id', 'name'), ['prompt' => 'Выберите с кем хотите встретиться']) ?>

    <?= $form->field($model, 'date')->input('datetime-local') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
