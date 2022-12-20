<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "token_exchange".
 *
 * @property int $id
 * @property string|null $phone_number
 * @property string|null $wallet
 * @property string|null $sum
 * @property string|null $email
 */
class TokenExchange extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token_exchange';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', 'wallet', 'sum','email'], 'string', 'max' => 255],
            [['phone_number', 'wallet', 'sum','email'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_number' => 'Phone Number',
            'wallet' => 'Wallet',
            'sum' => 'Sum',
        ];
    }
}
