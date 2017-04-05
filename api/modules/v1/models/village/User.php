<?php

namespace app\api\modules\v1\models\village;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property string $ID
 * @property string $VK_ID
 * @property integer $ALLIANCE_ID
 * @property string $VILLAGE_NAME
 * @property integer $PALACE
 * @property integer $FARM
 * @property integer $SMITHY
 * @property integer $TOWER
 * @property integer $CACHE
 * @property integer $GOLD
 * @property integer $MILLET
 * @property integer $DIAMOND
 * @property integer $KN_NUM
 * @property integer $KN_ATK
 * @property integer $KN_HP
 * @property integer $KN_ACC
 * @property integer $BW_NUM
 * @property integer $BW_ATK
 * @property integer $BW_HP
 * @property integer $BW_ACC
 * @property integer $SP_NUM
 * @property integer $SP_ATK
 * @property integer $SP_HP
 * @property integer $SP_ACC
 * @property integer $LAST_UPDATE
 *
 * @property Alliance[] $alliances
 * @property AllianceRequest[] $alliancesRequests
 *
 * @property Battle[] $battlesWhereDefender
 * @property Battle[] $battlesWhereAttacker
 * @property Alliance $alliance
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VK_ID', 'VILLAGE_NAME'], 'required'],
            [['VK_ID', 'ALLIANCE_ID', 'PALACE', 'FARM', 'SMITHY', 'TOWER', 'CACHE', 'GOLD', 'MILLET', 'DIAMOND', 'KN_NUM', 'KN_ATK', 'KN_HP', 'KN_ACC', 'BW_NUM', 'BW_ATK', 'BW_HP', 'BW_ACC', 'SP_NUM', 'SP_ATK', 'SP_HP', 'SP_ACC'], 'integer'],
            [['LAST_UPDATE'], 'safe'],
            [['VILLAGE_NAME'], 'string', 'max' => 15],
            [['VK_ID'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'VK_ID' => 'Vk  ID',
            'ALLIANCE_ID' => 'Alliance  ID',
            'VILLAGE_NAME' => 'Village  Name',
            'PALACE' => 'Palace',
            'FARM' => 'Farm',
            'SMITHY' => 'Smithy',
            'TOWER' => 'Tower',
            'CACHE' => 'Cache',
            'GOLD' => 'Gold',
            'MILLET' => 'Millet',
            'DIAMOND' => 'Diamond',
            'KN_NUM' => 'Kn  Num',
            'KN_ATK' => 'Kn  Atk',
            'KN_HP' => 'Kn  Hp',
            'KN_ACC' => 'Kn  Acc',
            'BW_NUM' => 'Bw  Num',
            'BW_ATK' => 'Bw  Atk',
            'BW_HP' => 'Bw  Hp',
            'BW_ACC' => 'Bw  Acc',
            'SP_NUM' => 'Sp  Num',
            'SP_ATK' => 'Sp  Atk',
            'SP_HP' => 'Sp  Hp',
            'SP_ACC' => 'Sp  Acc',
            'LAST_UPDATE' => 'Last  Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliances()
    {
        return $this->hasMany(Alliance::className(), ['ADMIN_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliancesRequests()
    {
        return $this->hasMany(AllianceRequest::className(), ['applicant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBattlesWhereAttacker()
    {
        return $this->hasMany(Battle::className(), ['ATTACKER_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBattlesWhereDefender()
    {
        return $this->hasMany(Battle::className(), ['DEFENDER_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliance()
    {
        return $this->hasOne(Alliance::className(), ['id' => 'alliance_id']);
    }
}
