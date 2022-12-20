<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "token".
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property float $value
 * @property float $token
 * @property string $currency
 * @property int $discount
 * @property float $price
 * @property float $price_token
 * @property float $price_token_with_discount
 * @property string $date
 * @property int $order_id
 * @property string $wallet
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'value', 'token', 'price', 'price_token', 'price_token_with_discount', 'order_id', 'wallet'], 'required'],
            [['user_id', 'discount', 'order_id'], 'integer'],
            [['type', 'currency', 'status'], 'string'],
            [['value', 'token', 'price', 'price_token', 'price_token_with_discount'], 'number'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['wallet'], 'string', 'max' => 64],
            [['type', 'order_id', 'user_id'], 'unique', 'targetAttribute' => ['type', 'order_id', 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'value' => 'Value',
            'token' => 'Token',
            'currency' => 'Currency',
            'discount' => 'Discount',
            'price' => 'Price',
            'price_token' => 'Price Token',
            'price_token_with_discount' => 'Price Token With Discount',
            'date' => 'Date',
            'order_id' => 'Order ID',
            'wallet' => 'Wallet',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }
}
