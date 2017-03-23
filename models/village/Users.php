<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property integer $vk_id
 * @property integer $alliance_id
 * @property string $village_name
 * @property integer $palace
 * @property integer $farm
 * @property integer $smithy
 * @property integer $tower
 * @property integer $cache
 * @property string $gold
 * @property integer $millet
 * @property string $diamond
 * @property string $kn_num
 * @property integer $kn_atk
 * @property integer $kn_hp
 * @property integer $kn_acc
 * @property string $bw_num
 * @property integer $bw_atk
 * @property integer $bw_hp
 * @property integer $bw_acc
 * @property string $sp_num
 * @property integer $sp_atk
 * @property integer $sp_hp
 * @property integer $sp_acc
 * @property string $last_update
 *
 * @property AlliancesRequests $alliancesRequests
 * @property Battles[] $battles
 * @property Battles[] $battles0
 * @property Alliances $alliance
 */
class Users extends \yii\db\ActiveRecord
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
            [['vk_id', 'alliance_id', 'village_name', 'last_update'], 'required'],
            [['vk_id', 'alliance_id', 'palace', 'farm', 'smithy', 'tower', 'cache', 'gold', 'millet', 'diamond', 'kn_num', 'kn_atk', 'kn_hp', 'kn_acc', 'bw_num', 'bw_atk', 'bw_hp', 'bw_acc', 'sp_num', 'sp_atk', 'sp_hp', 'sp_acc', 'last_update'], 'integer'],
            [['village_name'], 'string', 'max' => 15],
            [['vk_id'], 'unique'],
            [['alliance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alliances::className(), 'targetAttribute' => ['alliance_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vk_id' => 'Vk ID',
            'alliance_id' => 'Alliance ID',
            'village_name' => 'Village Name',
            'palace' => 'Palace',
            'farm' => 'Farm',
            'smithy' => 'Smithy',
            'tower' => 'Tower',
            'cache' => 'Cache',
            'gold' => 'Gold',
            'millet' => 'Millet',
            'diamond' => 'Diamond',
            'kn_num' => 'Kn Num',
            'kn_atk' => 'Kn Atk',
            'kn_hp' => 'Kn Hp',
            'kn_acc' => 'Kn Acc',
            'bw_num' => 'Bw Num',
            'bw_atk' => 'Bw Atk',
            'bw_hp' => 'Bw Hp',
            'bw_acc' => 'Bw Acc',
            'sp_num' => 'Sp Num',
            'sp_atk' => 'Sp Atk',
            'sp_hp' => 'Sp Hp',
            'sp_acc' => 'Sp Acc',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliancesRequests()
    {
        return $this->hasOne(AlliancesRequests::className(), ['applicant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBattles()
    {
        return $this->hasMany(Battles::className(), ['attacker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBattles0()
    {
        return $this->hasMany(Battles::className(), ['defender_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliance()
    {
        return $this->hasOne(Alliances::className(), ['id' => 'alliance_id']);
    }
}
