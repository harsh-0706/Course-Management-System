<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveFrom;
?>

<div class="drop">
	<? $form=ActiveFrom::begin([
		'action'=>'drop',
		'method'=>'post',
	]); ?>
	<?= $form->field($model,'sid') ?>
	<?= $form->field($model,'cid') ?>

	<?= Html::a('Drop',['deleter','id'=>$model->sid,'id2'=>$model->cid],['class'=>'btn btn-sm btn-danger',
		'data'=>[
			'confirm'=>'Are you sure you want to drop course',
			'method'=>'post'
		],
]) ?>
</div>