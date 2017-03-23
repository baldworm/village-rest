<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "battles".
 *
 * @property string $battle_id
 * @property string $attacker_id
 * @property string $defender_id
 * @property string $time_from
 * @property string $time_to
 * @property integer $time_left
 * @property string $attacker_kn_before
 * @property string $attacker_bw_before
 * @property string $attacker_sp_before
 * @property string $defender_kn_before
 * @property string $defender_bw_before
 * @property string $defender_sp_before
 * @property string $attacker_kn_after
 * @property string $attacker_bw_after
 * @property string $attacker_sp_after
 * @property string $defender_kn_after
 * @property string $defender_bw_after
 * @property string $defender_sp_after
 * @property string $millet
 * @property string $gold
 * @property integer $diamonds
 * @property string $type
 * @property boolean $visible
 *
 * @property Users $attacker
 * @property Users $defender
 */
class Battles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'battles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attacker_id', 'defender_id', 'time_from', 'time_to', 'time_left', 'attacker_kn_before', 'attacker_bw_before', 'attacker_sp_before', 'defender_kn_before', 'defender_bw_before', 'defender_sp_before', 'attacker_kn_after', 'attacker_bw_after', 'attacker_sp_after', 'defender_kn_after', 'defender_bw_after', 'defender_sp_after', 'millet', 'gold', 'diamonds', 'type'], 'required'],
            [['attacker_id', 'defender_id', 'time_from', 'time_to', 'time_left', 'attacker_kn_before', 'attacker_bw_before', 'attacker_sp_before', 'defender_kn_before', 'defender_bw_before', 'defender_sp_before', 'attacker_kn_after', 'attacker_bw_after', 'attacker_sp_after', 'defender_kn_after', 'defender_bw_after', 'defender_sp_after', 'millet', 'gold', 'diamonds'], 'integer'],
            [['type'], 'string'],
            [['visible'], 'boolean'],
            [['attacker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['attacker_id' => 'id']],
            [['defender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['defender_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'battle_id' => 'Battle ID',
            'attacker_id' => 'Attacker ID',
            'defender_id' => 'Defender ID',
            'time_from' => 'Time From',
            'time_to' => 'Time To',
            'time_left' => 'Time Left',
            'attacker_kn_before' => 'Attacker Kn Before',
            'attacker_bw_before' => 'Attacker Bw Before',
            'attacker_sp_before' => 'Attacker Sp Before',
            'defender_kn_before' => 'Defender Kn Before',
            'defender_bw_before' => 'Defender Bw Before',
            'defender_sp_before' => 'Defender Sp Before',
            'attacker_kn_after' => 'Attacker Kn After',
            'attacker_bw_after' => 'Attacker Bw After',
            'attacker_sp_after' => 'Attacker Sp After',
            'defender_kn_after' => 'Defender Kn After',
            'defender_bw_after' => 'Defender Bw After',
            'defender_sp_after' => 'Defender Sp After',
            'millet' => 'Millet',
            'gold' => 'Gold',
            'diamonds' => 'Diamonds',
            'type' => 'Type',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttacker()
    {
        return $this->hasOne(Users::className(), ['id' => 'attacker_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefender()
    {
        return $this->hasOne(Users::className(), ['id' => 'defender_id']);
    }
}
