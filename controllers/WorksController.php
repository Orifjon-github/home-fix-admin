<?php

namespace app\controllers;

use app\models\Works;
use app\models\WorksSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * WorksController implements the CRUD actions for Works model.
 */
class WorksController extends Controller
{
    public function actionIndex(): string
    {
        return HelperService::index($this, new WorksSearch());
    }

    public function actionView($id): string
    {
        return HelperService::viewModel($this, new Works(), $id);
    }

    public function actionCreate()
    {
        return HelperService::createModel($this, new Works());
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new Works(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Works(), $id)->delete();

        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Works(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }
}
