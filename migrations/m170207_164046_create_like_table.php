<?php

use yii\db\Migration;

/**
 * Handles the creation of table `like`.
 */
class m170207_164046_create_like_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('like', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'object_type' => $this->string(12)->notNull(),
            'object_name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('like');
    }
}
