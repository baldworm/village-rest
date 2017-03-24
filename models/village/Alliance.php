<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "alliances".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $PREFIX_NAME
 * @property string $POPULATION
 * @property string $AVERAGE_LEVEL
 * @property string $ADMIN_ID
 * @property string $PASS_HASH
 * @property string $MAIL
 *
 * @property User $aDMIN
 * @property AllianceRequest[] $alliancesRequests
 * @property User[] $users
 */
class Alliance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alliances';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'PREFIX_NAME', 'POPULATION', 'AVERAGE_LEVEL', 'ADMIN_ID', 'PASS_HASH', 'MAIL'], 'required'],
            [['POPULATION', 'AVERAGE_LEVEL', 'ADMIN_ID'], 'integer'],
            [['NAME'], 'string', 'max' => 20],
            [['PREFIX_NAME'], 'string', 'max' => 4],
            [['PASS_HASH'], 'string', 'max' => 6],
            [['MAIL'], 'string', 'max' => 35],
            [['ADMIN_ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ADMIN_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAME' => 'Name',
            'PREFIX_NAME' => 'Prefix  Name',
            'POPULATION' => 'Population',
            'AVERAGE_LEVEL' => 'Average  Level',
            'ADMIN_ID' => 'Admin  ID',
            'PASS_HASH' => 'Pass  Hash',
            'MAIL' => 'Mail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getADMIN()
    {
        return $this->hasOne(User::className(), ['ID' => 'ADMIN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliancesRequests()
    {
        return $this->hasMany(AllianceRequest::className(), ['alliance_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['alliance_id' => 'id']);
    }
}
