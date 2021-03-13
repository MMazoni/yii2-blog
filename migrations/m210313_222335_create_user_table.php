<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m210313_222335_create_user_table
 */
class m210313_222335_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210313_222335_user cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'access_token' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
