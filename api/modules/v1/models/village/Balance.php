<?php
/**
 * Created by PhpStorm.
 * User: nj
 * Date: 05.04.2017
 * Time: 14:31
 */

namespace app\api\modules\v1\models\village;



define("WARRIOR_SPEAR", "sp");
define("WARRIOR_BOWMAN", "bw");
define("WARRIOR_KNIGHT", "sh");

define ("BATTLE_STOLE_RESOURCES_RATES", 0.2);



class Balance
{
    const PERIOD = 3600;

    const LAST_ONLINE = 3600 * 24 * 15;
    const BATTLE_OFFLINE = 120;

    public static function outputPalace ($lvl){
        return self::goldSpd($lvl) * 4;
    }
    public static function outputFarm ($lvl){
        return self::goldSpd($lvl)*14/17;
    }
    public static function outputTower ($lvl){
        //todo;
    }
    public static function outputCache ($lvl){
        return self::goldSpd($lvl)*$lvl;
    }
    public static function goldSpd ($lvl){
        return pow($lvl, 4)*17 / pow($lvl + 1, 2);
    }

    public static function updateCostPalace ($lvl){
        return self::goldSpd($lvl)*2.4*($lvl+1);
    }
    public static function updateCostFarm ($lvl){
        return self::goldSpd($lvl)*2.4*pow($lvl,0.8);
    }
    public static function updateCostTower ($lvl){
        return self::goldSpd($lvl+10)*2.2*pow($lvl+10, 0.8);
    }
    public static function updateCostCache ($lvl){
        return self::goldSpd($lvl)*$lvl*$lvl;
    }

    public static function warriorsCostGold ($warrior){
        switch ($warrior){
            case WARRIOR_SPEAR:
                return 18;
            case WARRIOR_BOWMAN:
                return 15;
            case WARRIOR_KNIGHT:
                return 20;
        }
        return 0;
    }
    public static function warriorsCostMillet ($warrior){
        switch ($warrior){
            case WARRIOR_SPEAR:
            case WARRIOR_BOWMAN:
            case WARRIOR_KNIGHT:
                return 15;
        }
        return 0;
    }

    public static function ratesExchange (){
        return .8;
    }

    public static function battleGoldMax ($lvl){
        return self::goldSpd($lvl)*$lvl;
    }
    public static function battleMilletMax ($lvl){
        return self::goldSpd($lvl)*$lvl;
    }
    public static function battleRelaxTime ($dGold,$lvl){
        return round(60*(-18/(($dGold/(self::goldSpd($lvl) * 4)) + 4) + 5));
    }
}