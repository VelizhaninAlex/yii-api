<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tournament_status".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $lang
 */
class TournamentStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'string', 'max' => 255],
            ['lang','string','max'=>2]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'lang' => 'Language',
            'unable_text' => 'Unable text'
        ];
    }
}
?>