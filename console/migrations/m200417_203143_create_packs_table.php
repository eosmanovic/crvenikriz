<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%packs}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m200417_203143_create_packs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%packs}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'body' => $this->text(),
            'img' => $this->string(),
            'date' => $this->string(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-packs-user_id}}',
            '{{%packs}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-packs-user_id}}',
            '{{%packs}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-packs-user_id}}',
            '{{%packs}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-packs-user_id}}',
            '{{%packs}}'
        );

        $this->dropTable('{{%packs}}');
    }
}
