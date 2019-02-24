<?php

use yii\db\Migration;

/**
 * Class m190224_152116_create_column_auth_key_user
 */
class m190224_152116_create_column_auth_key_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'auth_key', $this->string(60)->notNull()->unique()->after('contact_phone'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'auth_key');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190224_152116_create_column_auth_key_user cannot be reverted.\n";

        return false;
    }
    */
}
