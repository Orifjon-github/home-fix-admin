<?php
namespace app\controllers;

use Yii;
use app\models\WorkerUserModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class WorkerUserController extends Controller
{
    // List all worker users
    public function actionIndex()
    {
        $users = WorkerUserModel::find()->all(); // Fetch all users
        return $this->render('worker/index', ['users' => $users]);
    }

    // Create a new worker user
    public function actionCreate()
    {
        $model = new WorkerUserModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']); // Redirect to the index page after saving
        }

        return $this->render('create', ['model' => $model]);
    }

    // Update an existing worker user
    public function actionUpdate($id)
    {
        $model = $this->findModel($id); // Fetch the user by ID

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']); // Redirect after updating
        }

        return $this->render('update', ['model' => $model]);
    }

    // Delete a worker user
    public function actionDelete($id)
    {
        $this->findModel($id)->delete(); // Delete the user by ID
        return $this->redirect(['index']); // Redirect after deletion
    }

    // Find a model based on its primary key
    protected function findModel($id)
    {
        if (($model = WorkerUserModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Ajax validation for creating/updating
    public function actionValidate()
    {
        $model = new WorkerUserModel();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}
