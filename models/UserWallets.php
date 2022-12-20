<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_wallets".
 *
 * @property int $id
 * @property string|null $status
 * @property int $user_id
 * @property string $type
 * @property string $wallet
 * @property float|null $value
 * @property float|null $token
 * @property float|null $control_value
 * @property string|null $description
 * @property string $updated_at
 * @property string $created_at
 */
class UserWallets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_wallets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'type'], 'string'],
            [['user_id', 'wallet'], 'required'],
            [['user_id'], 'integer'],
            [['value', 'token', 'control_value'], 'number'],
            [['updated_at', 'created_at'], 'safe'],
            [['wallet'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 255],
            [['type', 'user_id', 'wallet'], 'unique', 'targetAttribute' => ['type', 'user_id', 'wallet']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'user_id' => 'User ID',
            'type' => 'Type',
            'wallet' => 'Wallet',
            'value' => 'Value',
            'token' => 'Token',
            'control_value' => 'Control Value',
            'description' => 'Description',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
