<?php

namespace app\controllers;

use app\models\Processes;
use app\models\ProcessesSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class ProcessesController extends Controller
{
    public function actionIndex(): string
    {
        return HelperService::index($this, new ProcessesSearch());
    }

    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => HelperService::findModel(new Processes(), $id),
        ]);
    }

    public function actionCreate(): Response|string
    {
        return HelperService::createModel($this, new Processes());
    }

    public function actionUpdate($id): Response|string
    {
        return HelperService::updateModel($this, new Processes(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Processes(), $id)->delete();
        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Processes(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }
}
