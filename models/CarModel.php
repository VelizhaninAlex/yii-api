<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_model".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $mark_id
 * @property int|null $sort_id
 * @property int|null $rating
 * @property int $is_seo_active
 * @property string|null $rgs_code
 * @property string|null $slug
 */
class CarModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark_id', 'sort_id', 'rating', 'is_seo_active'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['rgs_code'], 'string', 'max' => 9],
            [['slug'], 'string', 'max' => 200],
            [['mark_id', 'name'], 'unique', 'targetAttribute' => ['mark_id', 'name']],
            [['rgs_code'], 'unique'],
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
            'mark_id' => 'Mark ID',
            'sort_id' => 'Sort ID',
            'rating' => 'Rating',
            'is_seo_active' => 'Is Seo Active',
            'rgs_code' => 'Rgs Code',
            'slug' => 'Slug',
        ];
    }
}
