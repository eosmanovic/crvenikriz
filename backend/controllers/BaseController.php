<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * AdminController implements the CRUD actions for User model.
 */
class BaseController extends Controller
{
   
    protected function currentUser()
    {
        $id = Yii::$app->user->getId();
        if($id)
        {
            $user= User::find()->where(['id' => $id])->one();
            return $user;
        }else {
            $this->redirect(['site/login']);
        }
    }

    protected function logUser()
    {
        $id = Yii::$app->user->getId();
        return $id ? User::find()->where(['id' => $id])->one() : false;
    }

    protected function isAdmin()
    {
        $id = Yii::$app->user->getId();
        return $id ? true : false;
    }
   
    public function today()
    {

        return date("d.m.Y");
    }
}