<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_cars".
 *
 * @property int $id
 * @property string|null $front_view
 * @property string|null $left_view
 * @property string|null $back_view
 * @property string|null $right_view
 * @property int|null $user_id
 * @property int|null $moderated
 * @property int|null $brand_id
 * @property int|null $model_id
 * @property string|null $mileage
 * @property string|null $licence
 * @property string|null $vin
 * @property string|null $condition
 * @property string|null $year
 */
class UserCars extends \yii\db\ActiveRecord
{
    public $front;
    public $back;
    public $left;
    public $right;

    const STATUS_MODERATED = 'MODERATED';
    const STATUS_NOT_MODERATED = 'NOT MODERATED';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'moderated', 'brand_id', 'model_id','year'], 'integer'],
            [['mileage', 'licence', 'vin', 'condition'], 'string', 'max' => 255],
            [['front', 'left', 'back', 'right'], 'file', 'extensions' => 'png, jpg'],
            [['front', 'left', 'back', 'right', 'mileage', 'licence', 'vin', 'condition','year','user_id', 'moderated', 'brand_id', 'model_id'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'front' => 'Front',
            'left' => 'Left',
            'back' => 'Back',
            'right' => 'Right',
            'user_id' => 'User ID',
            'moderated' => 'Moderated',
            'brand_id' => 'Brand ID',
            'model_id' => 'Model ID',
            'mileage' => 'Mileage',
            'licence' => 'Licence',
            'vin' => 'Vin',
            'condition' => 'Condition',
            'year' => 'Year',
        ];
    }

    public function getStatusArray(){
        return[
            self::STATUS_MODERATED,
            self::STATUS_NOT_MODERATED
        ];
    }

    /**
     * Gets query for [[CarModel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarModel()
    {
        return $this->hasOne(CarModel::class, ['id' => 'model_id']);
    }


    /**
     * Gets query for [[CarMark]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarMark()
    {
        return $this->hasOne(CarMark::class, ['id' => 'brand_id']);
    }
}
