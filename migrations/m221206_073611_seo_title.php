<?php

use yii\db\Migration;

/**
 * Class m221206_073611_seo_title
 */
class m221206_073611_seo_title extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('faq','seo_title','string');
        $this->addColumn('post','seo_title','string');
        $this->addColumn('action','seo_title','string');
        $this->addColumn('tournament','seo_title','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221206_073611_seo_title cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221206_073611_seo_title cannot be reverted.\n";

        return false;
    }
    */
}
