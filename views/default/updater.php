<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\registration\models\Student */

$this->title = 'Update Register: ' . $model->sid;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sid, 'url' => ['viewr', 'id' => $model->sid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_fromr', [
        'model' => $model,
    ]) ?>

</div>
