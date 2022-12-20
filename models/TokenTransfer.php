<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "token_transfer".
 *
 * @property int $id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $user_id
 * @property int $token_id
 * @property string $wallet_in
 * @property string $wallet_out
 * @property int $wallet_id_in
 * @property int $wallet_id_out
 * @property string|null $description
 */
class TokenTransfer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token_transfer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id', 'token_id', 'wallet_in', 'wallet_out', 'wallet_id_in', 'wallet_id_out'], 'required'],
            [['user_id', 'token_id', 'wallet_id_in', 'wallet_id_out'], 'integer'],
            [['wallet_in', 'wallet_out'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 255],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'token_id' => 'Token ID',
            'wallet_in' => 'Wallet In',
            'wallet_out' => 'Wallet Out',
            'wallet_id_in' => 'Wallet Id In',
            'wallet_id_out' => 'Wallet Id Out',
            'description' => 'Description',
        ];
    }

    public function getTokens()
    {
        return $this->hasMany(Token::class, ['id' => 'token_id']);
    }

    public function fields()
    {
        $fields = ['token' => 'tokens'];
        return array_merge(parent::fields(),$fields);
    }
}
