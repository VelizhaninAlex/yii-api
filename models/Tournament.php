<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tournament".
 *
 * @property int $id
 * @property string $name
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string $image
 * @property string|null $content
 * @property string|null $condition_text
 * @property string|null $prize_fund
 * @property string|null $currency
 * @property string $button_text
 * @property string $button_link
 * @property int $status
 * @property PrizePool[] $prizePools
 * @property TournamentTable[] $tournamentTables
 */
class Tournament extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'required'],
            [['date_start', 'date_end'], 'safe'],
            [['content', 'image', 'condition_text','button_link','button_text'], 'string'],
            [['name', 'prize_fund', 'currency'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 2],
            [['status'],'integer'],
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
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'image' => 'Image',
            'content' => 'Content',
            'condition_text' => 'Condition Text',
            'prize_fund' => 'Prize Fund',
            'currency' => 'Currency',
        ];
    }

    /**
     * Gets query for [[PrizePools]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrizePools()
    {
        return $this->hasMany(PrizePool::class, ['tournament_id' => 'id']);
    }

    /**
     * Gets query for [[TournamentStatuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentStatuses()
    {
        return $this->hasOne(TournamentStatus::class, ['code' => 'status','lang'=> 'lang']);
    }

    public function fields()
    {
        $fields = ['prize_pool' => 'prizePools','status_name' => 'tournamentStatuses'];
        return array_merge(parent::fields(),$fields);
    }
}
