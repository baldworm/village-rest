<?php
/**
 * Created by PhpStorm.
 * User: nzharkov
 * Date: 06.04.2017
 * Time: 16:23
 */
namespace app\tests\unit\models;


use app\api\modules\v1\models\village\GameModel;
use app\api\modules\v1\models\village\User;
use app\tests\fixtures\UserFixture;
use yii\codeception\DbTestCase;

class GameModelTest extends DbTestCase
{
    public $appConfig = 'api/config/api.php';

    /*
    public function fixtures()
    {
        return [
            'profiles' => UserFixture::className(),
        ];
    }
    */


    public function testGetAllActiveBattles()
    {
        $id = 4;
        $type = 'DURING';
        $battles = GameModel::getUserBattles($id,$type);

        $count = count($battles);
        error_log($count);
        //$this->assertEquals(4,$count);
    }

    public function testCreateUser(){
        $vk_id = 3;
        $village_name = "TEST USER 3";
        GameModel::createUser($vk_id, $village_name);

        $user = GameModel::getUserByVkId($vk_id);

        $id = $user->ID;

        error_log("id:".$id);

        self::assertEquals($vk_id, $user->ID );

    }


    public function testUpdateUserWhenNotInBattle(){
        $id = 1;
        $user = User::findOne($id);
        $gold = $user->GOLD;
        $millet = $user->MILLET;
        $last_update = $user->LAST_UPDATE;

        $user = GameModel::updateUser($id);
        $gold_new = $user->GOLD;
        $millet_new = $user->MILLET;
        $last_update_new = $user->LAST_UPDATE;

        assertTrue($gold_new - $gold > 0);
        assertTrue($millet_new - $millet> 0);
        assertTrue($last_update_new - $last_update > 0);
    }
}