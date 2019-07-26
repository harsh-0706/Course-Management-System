<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model frontend\modules\registration\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>
<p>Hello</p>
<div class="register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cid')->textInput() ?>

    <?= $form->field($model, 'cname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'professor')->textInput(['maxlength'=>true]) ?>
    <?= $form->field($model, 'credits')->textInput(['maxlength'=>true]) ?>
    <?= $form->field($model, 'lab')->dropdownList([
    	0=>'No',
    	1=>'Yes',
    ],
    ['prompt'=>'Select Category']
	); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>