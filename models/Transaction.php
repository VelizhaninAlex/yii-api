<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property string|null $Txhash
 * @property int|null $Blockno
 * @property int|null $UnixTimestamp
 * @property string|null $DateTime
 * @property string|null $From
 * @property string|null $To
 * @property string|null $ContractAddress
 * @property float|null $Value_IN(ETH)
 * @property float|null $Value_OUT(ETH)
 * @property float|null $CurrentValue @ $1246.63/Eth
 * @property float|null $TxnFee(ETH)
 * @property float|null $TxnFee(USD)
 * @property float|null $Historical $Price/Eth
 * @property string|null $Status
 * @property string|null $ErrCode
 * @property string|null $Method
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Txhash', 'DateTime', 'From', 'To', 'ContractAddress', 'Status', 'ErrCode', 'Method'], 'string'],
            [['Blockno', 'UnixTimestamp'], 'integer'],
            [['Value_IN(ETH)', 'Value_OUT(ETH)', 'CurrentValue @ $1246.63/Eth', 'TxnFee(ETH)', 'TxnFee(USD)', 'Historical $Price/Eth'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Txhash' => 'Txhash',
            'Blockno' => 'Blockno',
            'UnixTimestamp' => 'Unix Timestamp',
            'DateTime' => 'Date Time',
            'From' => 'From',
            'To' => 'To',
            'ContractAddress' => 'Contract Address',
            'Value_IN(ETH)' => 'Value In(eth)',
            'Value_OUT(ETH)' => 'Value Out(eth)',
            'CurrentValue @ $1246.63/Eth' => 'Current Value @ $1246 63/eth',
            'TxnFee(ETH)' => 'Txn Fee(eth)',
            'TxnFee(USD)' => 'Txn Fee(usd)',
            'Historical $Price/Eth' => 'Historical $price/eth',
            'Status' => 'Status',
            'ErrCode' => 'Err Code',
            'Method' => 'Method',
        ];
    }
}
