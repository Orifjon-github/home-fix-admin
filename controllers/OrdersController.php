<?php

namespace app\controllers;

use app\models\Orders;
use app\models\OrdersSearch;
use app\services\HelperService;
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

    public function actionView($id)
    {
        return HelperService::viewModel($this, new Orders(), $id);
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
        return $this->redirect(['view', 'id' => $id]);
    }
}
