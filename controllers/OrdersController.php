<?php

namespace app\controllers;

use app\models\Orders;
use app\models\OrdersSearch;
use app\models\TasksSearch;
use app\services\HelperService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    public function actionIndex()
    {
        return HelperService::index($this, new OrdersSearch());
    }

    public function actionView($id): string
    {
        $searchModel = new TasksSearch();
        $searchModel->order_id = $id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => HelperService::findModel(new Orders(), $id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate(): Response|string
    {
        return HelperService::createModel($this, new Orders());
    }

    public function actionUpdate($id): Response|string
    {
        return HelperService::updateModel($this, new Orders(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Orders(), $id)->delete();
        return $this->redirect(['index']);
    }

    public function actionActivate(): Response
    {
        $id = $this->request->get('id');
        $model = HelperService::findModel(new Orders(), $id);
        $model->status = 'active';
        $model->save(false);
        Yii::$app->session->setFlash('success', 'Order activated');
        return $this->redirect(['view', 'id' => $id]);
    }
}
