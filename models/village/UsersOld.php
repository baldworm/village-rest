<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "users_old".
 *
 * @property string $Id
 * @property string $viewer_id
 * @property string $Name
 * @property integer $palace_lv
 * @property integer $farm_lv
 * @property integer $smithy_lv
 * @property integer $tower_lv
 * @property integer $secret_lv
 * @property string $gold
 * @property integer $millet
 * @property string $diamond
 * @property integer $palace_lv_up
 * @property string $last_palace_lv_up
 * @property string $last_power_up
 * @property string $sh_num
 * @property integer $sh_atk
 * @property integer $sh_hp
 * @property integer $sh_acc
 * @property string $bw_num
 * @property integer $bw_atk
 * @property integer $bw_hp
 * @property integer $bw_acc
 * @property string $sp_num
 * @property integer $sp_atk
 * @property integer $sp_hp
 * @property integer $sp_acc
 * @property integer $sh_atk_up
 * @property integer $sh_hp_up
 * @property integer $sh_acc_up
 * @property integer $sp_atk_up
 * @property integer $sp_hp_up
 * @property integer $sp_acc_up
 * @property integer $bw_atk_up
 * @property integer $bw_hp_up
 * @property integer $bw_acc_up
 * @property integer $last_sp_atk_up
 * @property integer $last_sp_hp_up
 * @property integer $last_sp_acc_up
 * @property integer $last_sh_atk_up
 * @property integer $last_sh_hp_up
 * @property integer $last_sh_acc_up
 * @property integer $last_bw_atk_up
 * @property integer $last_bw_hp_up
 * @property integer $last_bw_acc_up
 * @property string $Time
 * @property string $gold_total
 * @property string $millet_total
 * @property string $gold_stolen
 * @property string $millet_stolen
 * @property string $time_reg
 * @property integer $in_battle
 * @property string $battle_time
 * @property integer $graphics
 * @property string $last_online
 */
class UsersOld extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users_old';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['viewer_id', 'Name', 'diamond', 'palace_lv_up', 'last_palace_lv_up', 'last_power_up', 'sh_atk_up', 'sh_hp_up', 'sh_acc_up', 'sp_atk_up', 'sp_hp_up', 'sp_acc_up', 'bw_atk_up', 'bw_hp_up', 'bw_acc_up', 'last_sp_atk_up', 'last_sp_hp_up', 'last_sp_acc_up', 'last_sh_atk_up', 'last_sh_hp_up', 'last_sh_acc_up', 'last_bw_atk_up', 'last_bw_hp_up', 'last_bw_acc_up', 'Time', 'time_reg', 'last_online'], 'required'],
            [['viewer_id', 'palace_lv', 'farm_lv', 'smithy_lv', 'tower_lv', 'secret_lv', 'gold', 'millet', 'diamond', 'palace_lv_up', 'last_palace_lv_up', 'last_power_up', 'sh_num', 'sh_atk', 'sh_hp', 'sh_acc', 'bw_num', 'bw_atk', 'bw_hp', 'bw_acc', 'sp_num', 'sp_atk', 'sp_hp', 'sp_acc', 'sh_atk_up', 'sh_hp_up', 'sh_acc_up', 'sp_atk_up', 'sp_hp_up', 'sp_acc_up', 'bw_atk_up', 'bw_hp_up', 'bw_acc_up', 'last_sp_atk_up', 'last_sp_hp_up', 'last_sp_acc_up', 'last_sh_atk_up', 'last_sh_hp_up', 'last_sh_acc_up', 'last_bw_atk_up', 'last_bw_hp_up', 'last_bw_acc_up', 'Time', 'gold_total', 'millet_total', 'gold_stolen', 'millet_stolen', 'time_reg', 'in_battle', 'battle_time', 'graphics', 'last_online'], 'integer'],
            [['Name'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'viewer_id' => 'Viewer ID',
            'Name' => 'Name',
            'palace_lv' => 'Palace Lv',
            'farm_lv' => 'Farm Lv',
            'smithy_lv' => 'Smithy Lv',
            'tower_lv' => 'Tower Lv',
            'secret_lv' => 'Secret Lv',
            'gold' => 'Gold',
            'millet' => 'Millet',
            'diamond' => 'Diamond',
            'palace_lv_up' => 'Palace Lv Up',
            'last_palace_lv_up' => 'Last Palace Lv Up',
            'last_power_up' => 'Last Power Up',
            'sh_num' => 'Sh Num',
            'sh_atk' => 'Sh Atk',
            'sh_hp' => 'Sh Hp',
            'sh_acc' => 'Sh Acc',
            'bw_num' => 'Bw Num',
            'bw_atk' => 'Bw Atk',
            'bw_hp' => 'Bw Hp',
            'bw_acc' => 'Bw Acc',
            'sp_num' => 'Sp Num',
            'sp_atk' => 'Sp Atk',
            'sp_hp' => 'Sp Hp',
            'sp_acc' => 'Sp Acc',
            'sh_atk_up' => 'Sh Atk Up',
            'sh_hp_up' => 'Sh Hp Up',
            'sh_acc_up' => 'Sh Acc Up',
            'sp_atk_up' => 'Sp Atk Up',
            'sp_hp_up' => 'Sp Hp Up',
            'sp_acc_up' => 'Sp Acc Up',
            'bw_atk_up' => 'Bw Atk Up',
            'bw_hp_up' => 'Bw Hp Up',
            'bw_acc_up' => 'Bw Acc Up',
            'last_sp_atk_up' => 'Last Sp Atk Up',
            'last_sp_hp_up' => 'Last Sp Hp Up',
            'last_sp_acc_up' => 'Last Sp Acc Up',
            'last_sh_atk_up' => 'Last Sh Atk Up',
            'last_sh_hp_up' => 'Last Sh Hp Up',
            'last_sh_acc_up' => 'Last Sh Acc Up',
            'last_bw_atk_up' => 'Last Bw Atk Up',
            'last_bw_hp_up' => 'Last Bw Hp Up',
            'last_bw_acc_up' => 'Last Bw Acc Up',
            'Time' => 'Time',
            'gold_total' => 'Gold Total',
            'millet_total' => 'Millet Total',
            'gold_stolen' => 'Gold Stolen',
            'millet_stolen' => 'Millet Stolen',
            'time_reg' => 'Time Reg',
            'in_battle' => 'In Battle',
            'battle_time' => 'Battle Time',
            'graphics' => 'Graphics',
            'last_online' => 'Last Online',
        ];
    }
}
