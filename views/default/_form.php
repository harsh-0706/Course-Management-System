<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\registration\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>
<p>Hellop</p>
<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sid')->textInput() ?>
    <p>Student id should be of the form 200XXXXXX</p>
    <?= $form->field($model, 'sname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
