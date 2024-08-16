<?php

namespace app\controllers;

use app\models\Users;
use app\models\UsersSearch;
use app\services\HelperService;
use Illuminate\Support\Facades\Hash;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\Response;

class UsersController extends Controller
{
    public function actionIndex()
    {
        return HelperService::index($this, new UsersSearch());
    }

    public function actionView($id)
    {
        return HelperService::viewModel($this, new Users(), $id);
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Users(), $id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * @throws Exception
     */
    public function actionResetPassword($id): Response
    {
        Yii::$app->session->setFlash('error', 'Technical work in progress');
        return $this->redirect(['index']);
//        $user = Users::findOne($id);
//        $user->password = Hash::make($user->phone);
//        if ($user->save()) {
//            Yii::$app->session->setFlash('success','The user\'s password has been changed to his phone number');
//        } else {
//            Yii::$app->session->setFlash('error', 'The user\'s password was not changed');
//        }
//
//        return $this->redirect(['index']);
    }
}
