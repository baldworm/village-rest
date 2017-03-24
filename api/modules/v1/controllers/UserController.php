<?php

namespace app\api\modules\v1\controllers;

use app\models\village\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\rest\Controller;

class UserController extends Controller
{
    public $modelClass = 'app\models\village\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate($vk_id, $village_name)
    {
        $user = new User();
        $user->VK_ID = $vk_id;
        $user->VILLAGE_NAME = $village_name;



        $isInserted = $user->insert();

        if ($isInserted) {
            return $user;
        }else {
            return $user->errors;
        }

    }
/*
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] =[
            'class' => HttpBasicAuth::className(),
        ];

        return $behaviors;
    }
*/
}
