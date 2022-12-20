<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_mark".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $type_id
 * @property int|null $sort_id
 * @property int|null $rating
 * @property int|null $is_active
 * @property int $is_seo_active
 * @property string|null $slug
 */
class CarMark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_mark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'sort_id', 'rating', 'is_active', 'is_seo_active'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['slug'], 'string', 'max' => 200],
            [['type_id', 'name'], 'unique', 'targetAttribute' => ['type_id', 'name']],
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
            'type_id' => 'Type ID',
            'sort_id' => 'Sort ID',
            'rating' => 'Rating',
            'is_active' => 'Is Active',
            'is_seo_active' => 'Is Seo Active',
            'slug' => 'Slug',
        ];
    }
}
