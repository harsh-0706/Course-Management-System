<?php

namespace frontend\modules\registration\controllers;

use Yii;
use frontend\modules\registration\models\Student;
use frontend\modules\registration\models\StudentSearch;
use frontend\modules\registration\models\Register;
use frontend\modules\registration\models\RegisterSearch;
use frontend\modules\registration\models\Courses;
use frontend\modules\registration\models\CourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Student model.
 */
class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $searchModel1=new RegisterSearch();
        $searchModel2=new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider1= $searchModel1->search(Yii::$app->request->queryParams);
        $dataProvider2= $searchModel2->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1'=>$searchModel1,
            'dataProvider1'=>$dataProvider1,
            'searchModel2'=>$searchModel2,
            'dataProvider2'=>$dataProvider2,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $model=new Register();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['view','id'=>$model->sid]);
        }
        return $this->render('register',['model'=>$model]);
    }

    public function actionCourse()
    {
        $model=new Courses();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['view','id'=>$model->cid]);
        }
        return $this->render('course',['model'=>$model]);
    }
    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionUpdateRegister($id)
    {
        $model= $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['viewr','id'=>$model->sid]);
        }
        return $this->render('updater',['model'=>$model]);
    }
    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDrop($id,$id2)
    {
        $sid=$id;
        $cid=$id2;
        if($model=Student::find($sid,$cid)!==null)
        {
            $model=Student::find($sid,$cid)->delete();
            return $this->redirect(['index']);
        }
        return $this->render('drop',['model'=>$model]);
    }
    protected function deleter($id,$id2)
    {
        actionDrop($id,$id2);
    }
    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelR($id,$id2)
    {
        if(($model = Register::find($id,$id2) !== null)){
            return $model;
        }
    }
}
