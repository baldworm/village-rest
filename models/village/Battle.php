<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "battles".
 *
 * @property string $BATTLE_ID
 * @property string $ATTACKER_ID
 * @property string $DEFENDER_ID
 * @property string $TIME_FROM
 * @property integer $TIME_DURATION_MINUTES
 * @property integer $TIME_LEFT
 * @property string $ATTACKER_KN_BEFORE
 * @property string $ATTACKER_BW_BEFORE
 * @property string $ATTACKER_SP_BEFORE
 * @property string $DEFENDER_KN_BEFORE
 * @property string $DEFENDER_BW_BEFORE
 * @property string $DEFENDER_SP_BEFORE
 * @property string $ATTACKER_KN_AFTER
 * @property string $ATTACKER_BW_AFTER
 * @property string $ATTACKER_SP_AFTER
 * @property string $DEFENDER_KN_AFTER
 * @property string $DEFENDER_BW_AFTER
 * @property string $DEFENDER_SP_AFTER
 * @property string $MILLET
 * @property string $GOLD
 * @property integer $DIAMONDS
 * @property string $TYPE
 * @property boolean $VISIBLE
 *
 * @property User $attacker
 * @property User $defender
 */
class Battle extends \yii\db\ActiveRecord
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
            [['ATTACKER_ID', 'DEFENDER_ID', 'TIME_DURATION_MINUTES', 'TIME_LEFT', 'ATTACKER_KN_BEFORE', 'ATTACKER_BW_BEFORE', 'ATTACKER_SP_BEFORE', 'DEFENDER_KN_BEFORE', 'DEFENDER_BW_BEFORE', 'DEFENDER_SP_BEFORE', 'ATTACKER_KN_AFTER', 'ATTACKER_BW_AFTER', 'ATTACKER_SP_AFTER', 'DEFENDER_KN_AFTER', 'DEFENDER_BW_AFTER', 'DEFENDER_SP_AFTER', 'MILLET', 'GOLD', 'DIAMONDS', 'TYPE'], 'required'],
            [['ATTACKER_ID', 'DEFENDER_ID', 'TIME_DURATION_MINUTES', 'TIME_LEFT', 'ATTACKER_KN_BEFORE', 'ATTACKER_BW_BEFORE', 'ATTACKER_SP_BEFORE', 'DEFENDER_KN_BEFORE', 'DEFENDER_BW_BEFORE', 'DEFENDER_SP_BEFORE', 'ATTACKER_KN_AFTER', 'ATTACKER_BW_AFTER', 'ATTACKER_SP_AFTER', 'DEFENDER_KN_AFTER', 'DEFENDER_BW_AFTER', 'DEFENDER_SP_AFTER', 'MILLET', 'GOLD', 'DIAMONDS'], 'integer'],
            [['TIME_FROM'], 'safe'],
            [['TYPE'], 'string'],
            [['VISIBLE'], 'boolean'],
            [['attacker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['attacker_id' => 'id']],
            [['defender_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['defender_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BATTLE_ID' => 'Battle  ID',
            'ATTACKER_ID' => 'Attacker  ID',
            'DEFENDER_ID' => 'Defender  ID',
            'TIME_FROM' => 'Time  From',
            'TIME_DURATION_MINUTES' => 'Time  Duration  Minutes',
            'TIME_LEFT' => 'Time  Left',
            'ATTACKER_KN_BEFORE' => 'Attacker  Kn  Before',
            'ATTACKER_BW_BEFORE' => 'Attacker  Bw  Before',
            'ATTACKER_SP_BEFORE' => 'Attacker  Sp  Before',
            'DEFENDER_KN_BEFORE' => 'Defender  Kn  Before',
            'DEFENDER_BW_BEFORE' => 'Defender  Bw  Before',
            'DEFENDER_SP_BEFORE' => 'Defender  Sp  Before',
            'ATTACKER_KN_AFTER' => 'Attacker  Kn  After',
            'ATTACKER_BW_AFTER' => 'Attacker  Bw  After',
            'ATTACKER_SP_AFTER' => 'Attacker  Sp  After',
            'DEFENDER_KN_AFTER' => 'Defender  Kn  After',
            'DEFENDER_BW_AFTER' => 'Defender  Bw  After',
            'DEFENDER_SP_AFTER' => 'Defender  Sp  After',
            'MILLET' => 'Millet',
            'GOLD' => 'Gold',
            'DIAMONDS' => 'Diamonds',
            'TYPE' => 'Type',
            'VISIBLE' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttacker()
    {
        return $this->hasOne(User::className(), ['id' => 'attacker_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefender()
    {
        return $this->hasOne(User::className(), ['id' => 'defender_id']);
    }
}
