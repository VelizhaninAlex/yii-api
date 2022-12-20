<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m221220_144824_presale_orders_table
 */
class m221220_144824_presale_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presale_order', [
            'id' => Schema::TYPE_PK,
            'sum' => Schema::TYPE_STRING . ' NOT NULL',
            'wallet' => Schema::TYPE_TEXT . ' NOT NULL',
            'user_id' => Schema::TYPE_BIGINT . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('presale_order');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221220_144824_presale_orders_table cannot be reverted.\n";

        return false;
    }
    */
}
