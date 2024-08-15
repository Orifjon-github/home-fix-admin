<?php

namespace app\controllers;

use app\models\ServiceAdvantagesSearch;
use app\models\Services;
use app\models\ServicesSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class ServicesController extends Controller
{
    public function actionIndex()
    {
        return HelperService::index($this, new ServicesSearch());
    }

    public function actionView($id): string
    {
        $searchModel = new ServiceAdvantagesSearch();
        $searchModel->service_id = $id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => HelperService::findModel(new Services(), $id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate()
    {
        return HelperService::createModel($this, new Services());
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new Services(), $id);
    }

    public function actionDelete($id): Response
    {
        Helperservice::findModel(new Services(), $id)->delete();
        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Services(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }
}
