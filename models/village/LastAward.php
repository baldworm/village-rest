<?php

namespace app\models\village;

use Yii;

/**
 * This is the model class for table "last_award".
 *
 * @property string $unixtime
 */
class LastAward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'last_award';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unixtime'], 'required'],
            [['unixtime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unixtime' => 'Unixtime',
        ];
    }
}
