<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_type".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $sort_id
 * @property int|null $rating
 */
class CarType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort_id', 'rating'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['name'], 'unique'],
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
            'sort_id' => 'Sort ID',
            'rating' => 'Rating',
        ];
    }
}
