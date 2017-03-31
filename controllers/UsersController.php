<?php

namespace app\controllers;

use app\api\modules\v1\controllers\AuthController;

class UsersController extends AuthController
{
    public $modelClass = 'app\models\village\UsersOld';
}
