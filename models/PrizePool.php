<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prize_pool".
 *
 * @property int $id
 * @property string $position
 * @property string $prize
 * @property int|null $tournament_id
 *
 * @property Tournament $tournament
 */
class PrizePool extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prize_pool';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position', 'prize'], 'required'],
            [['tournament_id'], 'integer'],
            [['position', 'prize'], 'string', 'max' => 255],
            [['tournament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::class, 'targetAttribute' => ['tournament_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'prize' => 'Prize',
            'tournament_id' => 'Tournament ID',
        ];
    }

    /**
     * Gets query for [[Tournament]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTournament()
    {
        return $this->hasOne(Tournament::class, ['id' => 'tournament_id']);
    }
}
