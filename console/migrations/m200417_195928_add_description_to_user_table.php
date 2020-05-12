<?php

use yii\db\Migration;

/**
 * Class m200417_195928_add_description_to_user_table
 */
class m200417_195928_add_description_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'description');
    }
}
