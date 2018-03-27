<?php

use yii\db\Migration;

/**
 * Handles the creation of table `urls`.
 */
class m180327_131224_create_urls_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('url', [
            'id' => $this->primaryKey(),
            'url'=> $this->string(),
            'short_url' =>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('urls');
    }
}
