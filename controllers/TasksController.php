<?php

namespace app\controllers;

use app\models\TaskEquipment;
use app\models\TaskImages;
use app\models\Tasks;
use app\models\TasksMaterials;
use app\models\TasksSearch;
use app\models\TaskWorker;
use app\models\TaskWorkerUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TasksController implements the CRUD actions for Tasks model.
 */
class TasksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Tasks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $materials = new ActiveDataProvider([
            'query' => TasksMaterials::find()->where(['task_id' => $id]),
        ]);
        $taskImages = new ActiveDataProvider([
            'query'=> TaskImages::find()->where(['task_id' => $id])
        ]);
        $taskWorks = new ActiveDataProvider([
            'query'=> TaskWorker::find()->where(['task_id' => $id])
        ]);
        $taskWorks = new ActiveDataProvider([
            'query'=> TaskWorker::find()->where(['task_id' => $id])
        ]);
        $workers = new ActiveDataProvider([
            'query'=> TaskWorkerUser::find()->where(['task_id' => $id])
        ]);
//        $equptments = new ActiveDataProvider([
//            'query' => TaskEquipment::find()->where(['task_id' => $id]),
//
//        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'materials' => $materials,
            'images'=>$taskImages,
            'works'=>$taskWorks,
            'workers'=>$workers
//            'equptments'=>$equptments
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tasks();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
