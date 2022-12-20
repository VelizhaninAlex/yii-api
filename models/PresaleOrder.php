<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presale_order".
 *
 * @property int $id
 * @property string $sum
 * @property string $wallet
 * @property int $user_id
 */
class PresaleOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presale_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sum', 'wallet', 'user_id'], 'required'],
            [['wallet'], 'string'],
            [['user_id'], 'integer'],
            [['sum'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sum' => 'Sum',
            'wallet' => 'Wallet',
            'user_id' => 'User ID',
        ];
    }
}
