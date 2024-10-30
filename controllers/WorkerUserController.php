<?php

namespace app\controllers;


use app\models\WorkerUsers;
use app\models\WorkerUsersSearch;
use app\services\FileService;
use app\services\HelperService;
use Yii;
use yii\db\Exception;
use yii\web\Controller;

use yii\web\Response;

class WorkerUserController extends Controller
{

    public function actionIndex()
    {
        return HelperService::index($this, new WorkerUsersSearch());
    }

    public function actionView($id)
    {
        return HelperService::viewModel($this, new WorkerUsers(), $id);
    }

    /**
     * @throws \yii\base\Exception
     * @throws Exception
     */
    public function actionCreate(): Response|string
    {
        $model = new WorkerUsers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
                $fileService = new FileService($model);
                $fileService->create();
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
        return HelperService::updateModel($this, new WorkerUsers(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new WorkerUsers(), $id)->delete();
        return $this->redirect(['index']);
    }

}
