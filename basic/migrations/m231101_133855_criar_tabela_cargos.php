<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m231101_133855_criar_tabela_cargos
 */
class m231101_133855_criar_tabela_cargos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cargos', [
            'id' => 'pk',
            'nome' => Schema::TYPE_STRING . ' NOT NULL',            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231101_133855_criar_tabela_cargos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231101_133855_criar_tabela_cargos cannot be reverted.\n";

        return false;
    }
    */
}
