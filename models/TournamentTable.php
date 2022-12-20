<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tournament_table".
 *
 * @property int $id
 * @property int|null $place
 * @property string $prize
 * @property int|null $tournament_id
 * @property string|null $nickname
 *
 * @property Tournament $tournament
 */
class TournamentTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place', 'tournament_id'], 'integer'],
            [['prize'], 'required'],
            [['prize', 'nickname'], 'string', 'max' => 255],
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
            'place' => 'Place',
            'prize' => 'Prize',
            'tournament_id' => 'Tournament ID',
            'nickname' => 'Nickname',
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
