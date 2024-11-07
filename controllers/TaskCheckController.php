<?php

namespace app\controllers;

use app\models\TaskImages;
use app\models\Tasks;
use app\models\TasksMaterials;
use app\models\TasksSearch;
use app\models\TaskWorker;
use app\models\TaskWorkerUser;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class TaskCheckController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Tasks::find()->where(['status' => 'checking']);
        // Create the ActiveDataProvider instance
        $dataProvider = new ActiveDataProvider([
            'query' => $query,  // Pass the query
            'pagination' => [
                'pageSize' => 20,  // Define how many items per page (optional)
            ],
        ]);
        // Render the view and pass the dataProvider
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id){
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
        return $this->render('view', [
            'model' => $this->findModel($id),
            'materials' => $materials,
            'images'=>$taskImages,
            'works'=>$taskWorks,
            'workers'=>$workers
        ]);
    }
    public function actionUpdateStatus($id)
    {
        $model = Tasks::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException('Task not found');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Status updated successfully.');
            return $this->redirect(['view', 'id' => $model->id]);  // Redirect to the task's view page
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Tasks::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
