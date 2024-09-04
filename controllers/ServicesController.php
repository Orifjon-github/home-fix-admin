<?php

namespace app\controllers;

use app\models\ServiceAdvantagesSearch;
use app\models\Services;
use app\models\ServicesSearch;
use app\services\FileService;
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
        $model = new Services();
        if ($this->request->isPost) {
            $fileService = new FileService($model);
            if ($model->load($this->request->post())) {
                $fileService->create('image');
                $fileService->create('video_bg');
                $fileService->create('icon');
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = HelperService::findModel(new Services(), $id);
        $fileService = new FileService($model);
        $oldValue = $model->image;
        $oldValueBg = $model->video_bg;
        $oldValueIcon = $model->icon;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $fileService->update($oldValue);
            $fileService->update($oldValueBg, attr: 'video_bg');
            $fileService->update($oldValueIcon, attr: 'icon');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
