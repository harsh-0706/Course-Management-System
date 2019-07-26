<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\registration\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sid',
            'sname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <h1>Register</h1>
    <p>
        <?= Html::a('Register course',['register'],['class'=>'btn btn-sm btn-success']) ?>
        <?= Html::a('Drop Course',['drop'],['class'=>'btn btn-sm btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider'=>$dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'sid',
            'cid',
            ['class'=>'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <h1>Courses</h1>
    <p>
        <?= Html::a('New Course',['course'],['class'=>'btn btn-sm btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider'=>$dataProvider2,
        'filterModel'=>$searchModel2,
        'columns' => [
            ['class'=>'yii\grid\SerialColumn'],
            'cid',
            'cname',
            'professor',
            'credits',
            ['class'=>'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
