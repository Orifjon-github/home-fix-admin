<?php

namespace app\controllers;

use app\models\Tasks;
use app\models\TasksSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class TasksController extends Controller
{
    public function actionIndex(): string
    {
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return HelperService::viewModel($this, new Tasks(), $id);
    }

    public function actionCreate($id)
    {
        return HelperService::createChildModel($this, new Tasks(), 'order', $id);
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new Tasks(), $id);
    }

    public function actionDelete($id): Response
    {
        return HelperService::deleteChild($this, new Tasks(), $id, 'order');
    }
}
