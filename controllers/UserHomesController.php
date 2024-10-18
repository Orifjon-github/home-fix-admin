<?php

namespace app\controllers;

use app\models\UserHomes;
use app\models\UserHomesSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

class UserHomesController extends Controller
{
    public function actionIndex()
    {
        return HelperService::index($this, new UserHomesSearch());
    }

    public function actionView($id)
    {
        return HelperService::viewModel($this, new UserHomes(), $id);
    }

    public function actionCreate()
    {
        $model = new UserHomes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
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
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new UserHomes(), $id)->delete();
        return $this->redirect(['index']);
    }
}
