<?php

namespace frontend\controllers;

use yii\rest\ActiveController as YiiActiveController;

use yii\filters\auth\HttpBearerAuth;

class ActiveController extends YiiActiveController
{
    public function behaviors()
    {
       $behaviors = parent::behaviors();
       $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
       ];

       return $behaviors;
    }
}