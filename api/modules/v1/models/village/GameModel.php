<?php
/**
 * Created by PhpStorm.
 * User: nj
 * Date: 05.04.2017
 * Time: 13:48
 */

namespace app\api\modules\v1\models\village;


use Exception;
use yii\base\Model;

class GameModel extends Model
{
    public function startSession($vk_id){

    }
    public function getUserByVkId ($vk_id){
        return User::findOne(['vk_id' => $vk_id]);
    }
    public function updateUser($id){
        $user = User::findOne($id);
        $period = time() - $user->LAST_UPDATE;
        $palace = $user->PALACE;
        $updGold = $user->GOLD + $period * Balance::outputPalace($palace);
        $millet = $user->MILLET;
        $bw_num = $user->BW_NUM;
        $sp_num = $user->SP_NUM;
        $kn_num = $user->KN_NUM;

        $allBattles = $this->getUserAllActiveBattles($user);

    }

    public function test (){
        $user = User::findOne(4);


        //$battles = $user->battles;

        $battles = $this->getUserAllActiveBattles(4);

        var_dump(count($battles));


    }
    private function getUserAllActiveBattles ($id){
        $query = "SELECT * FROM battles WHERE (ATTACKER_ID = $id OR DEFENDER_ID = $id) AND TYPE = 'DURING'";
        $battles = Battle::findBySql($query)->all();

        $this->closeActiveBattlesIfTimeout($battles);
        return $battles;
    }

    /**
     * @param Battle[] $battles
     */
    private function closeActiveBattlesIfTimeout($battles){
        foreach ($battles as $battle){
            $time_from = strtotime($battle->TIME_FROM);
            $time_duration = $battle->TIME_DURATION_MINUTES * 60;
            var_dump($time_from);
            var_dump($time_duration);
            $time_to = $time_from + $time_duration;
            $time_diff = time() - $time_to;

            if ($time_diff > Balance::BATTLE_OFFLINE){
                var_dump(">");
                $battle->TYPE = 'SURREND';
                $battle->save(false);
            }
            var_dump($time_diff);
        }
    }
}