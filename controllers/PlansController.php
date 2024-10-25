<?php

namespace app\controllers;

use app\models\PlanAdvantagesSearch;
use app\models\Plans;
use app\models\PlansSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

class PlansController extends Controller
{
    public function actionIndex()
    {
        return HelperService::index($this, new PlansSearch());
    }

    public function actionView($id): string
    {
        $searchModel = new PlanAdvantagesSearch();
        $searchModel->plan_id = $id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => HelperService::findModel(new Plans(), $id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate()
    {
        return HelperService::createModel($this, new Plans());
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new Plans(), $id);
    }

    public function actionDelete($id): Response
    {
        Helperservice::findModel(new Plans(), $id)->delete();
        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Plans(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }
}
