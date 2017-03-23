<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "alliances_requests".
 *
 * @property string $applicant_id
 * @property integer $alliance_id
 *
 * @property Users $applicant
 * @property Alliances $alliance
 */
class AlliancesRequests extends \yii\db\ActiveRecord
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
            [['applicant_id', 'alliance_id'], 'required'],
            [['applicant_id', 'alliance_id'], 'integer'],
            [['applicant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['applicant_id' => 'id']],
            [['alliance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alliances::className(), 'targetAttribute' => ['alliance_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'applicant_id' => 'Applicant ID',
            'alliance_id' => 'Alliance ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicant()
    {
        return $this->hasOne(Users::className(), ['id' => 'applicant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliance()
    {
        return $this->hasOne(Alliances::className(), ['id' => 'alliance_id']);
    }
}
