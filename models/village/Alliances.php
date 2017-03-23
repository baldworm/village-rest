<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "alliances".
 *
 * @property integer $id
 * @property string $name
 * @property string $sh_name
 * @property string $num
 * @property string $avg
 * @property string $admin
 * @property string $pass
 * @property string $mail
 *
 * @property AlliancesRequests[] $alliancesRequests
 * @property Users[] $users
 */
class Alliances extends \yii\db\ActiveRecord
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
            [['name', 'sh_name', 'num', 'avg', 'admin', 'pass', 'mail'], 'required'],
            [['num', 'avg', 'admin'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['sh_name'], 'string', 'max' => 4],
            [['pass'], 'string', 'max' => 6],
            [['mail'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sh_name' => 'Sh Name',
            'num' => 'Num',
            'avg' => 'Avg',
            'admin' => 'Admin',
            'pass' => 'Pass',
            'mail' => 'Mail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliancesRequests()
    {
        return $this->hasMany(AlliancesRequests::className(), ['alliance_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['alliance_id' => 'id']);
    }
}
