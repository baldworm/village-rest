<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "alliances_requests".
 *
 * @property string $APPLICANT_ID
 * @property integer $ALLIANCE_ID
 *
 * @property User $applicant
 * @property Alliance $alliance
 */
class AllianceRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alliances_requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['APPLICANT_ID', 'ALLIANCE_ID'], 'required'],
            [['APPLICANT_ID', 'ALLIANCE_ID'], 'integer'],
            [['applicant_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['applicant_id' => 'id']],
            [['alliance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alliance::className(), 'targetAttribute' => ['alliance_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'APPLICANT_ID' => 'Applicant  ID',
            'ALLIANCE_ID' => 'Alliance  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicant()
    {
        return $this->hasOne(User::className(), ['id' => 'applicant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliance()
    {
        return $this->hasOne(Alliance::className(), ['id' => 'alliance_id']);
    }
}
