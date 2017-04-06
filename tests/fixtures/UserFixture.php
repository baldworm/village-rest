<?php
/**
 * Created by PhpStorm.
 * User: nzharkov
 * Date: 06.04.2017
 * Time: 15:15
 */

namespace app\tests\fixtures;

//require(YII_APP_BASE_PATH . '/common/config/main.php');
//require(YII_APP_BASE_PATH . '/common/config/main-local.php');
//require(dirname(__DIR__) . '/config.php');
//require(dirname(__DIR__) . '/unit.php');




use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
    public $modelClass = 'app\api\modules\v1\models\village\User';
}