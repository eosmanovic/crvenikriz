<?php

use yii\db\Migration;

/**
 * Class m200417_213014_add_first_last_name_to_packs_table
 */
class m200417_213014_add_first_last_name_to_packs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%packs}}', 'first_name', $this->text());
        $this->addColumn('{{%packs}}', 'last_name', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%packs}}', 'first_name');
        $this->dropColumn('{{%packs}}', 'last_name');
    }
}
