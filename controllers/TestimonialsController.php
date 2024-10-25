<?php

namespace app\controllers;

use app\models\Testimonials;
use app\models\TestimonialsSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\Response;

/**
 * WorksController implements the CRUD actions for Works model.
 */
class TestimonialsController extends Controller
{
    public function actionIndex(): string
    {
        return HelperService::index($this, new TestimonialsSearch());
    }

    public function actionView($id): string
    {
        return HelperService::viewModel($this, new Testimonials(), $id);
    }

    public function actionCreate()
    {
        return HelperService::createModel($this, new Testimonials());
    }

    public function actionUpdate($id)
    {
        return HelperService::updateModel($this, new Testimonials(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Testimonials(), $id)->delete();

        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Testimonials(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }
}
