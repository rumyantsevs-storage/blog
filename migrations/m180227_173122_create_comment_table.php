<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m180227_173122_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'text'=>$this->string(),
            'article_id'=>$this->integer(),
        ]);
        // creates index for column `article_id`
        $this->createIndex(
            'idx-article_id',
            'comment',
            'article_id'
        );
        // add foreign key for table `article`
        $this->addForeignKey(
            'fk-article_id',
            'comment',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}
