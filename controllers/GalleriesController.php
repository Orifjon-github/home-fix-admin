<?php

namespace app\controllers;

use app\models\Galleries;
use app\models\GalleriesSearch;
use app\services\HelperService;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * GalleriesController implements the CRUD actions for Galleries model.
 */
class GalleriesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Galleries models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GalleriesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Galleries model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Galleries model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Galleries();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $newValue = UploadedFile::getInstance($model, 'image');
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValue->extension;
                $filePath = $uploadPath . $fileName;
                if ($newValue->saveAs($filePath)) {
                    $model->image = $filePath;
                }
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

    /**
     * Updates an existing Galleries model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldValue = $model->image;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $newValue = UploadedFile::getInstance($model, 'image');
            if ($newValue) {
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValue->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValue->saveAs($filePath)) {
                    $model->image = $filePath;
                }
            } else {
                $model->image = $oldValue;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @throws StaleObjectException
     * @throws \Throwable
     * @throws NotFoundHttpException
     */
    public function actionDelete($id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionEnable($id): Response
    {
        $model = $this->findModel($id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel($id): ?Galleries
    {
        if (($model = Galleries::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
