<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m231101_133866_criar_tabela_funcionarios
 */
class m231101_133866_criar_tabela_funcionarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('funcionarios', [
            'id' => 'pk',
            'nome' => Schema::TYPE_STRING . ' NOT NULL',
            'id_cargo' => $this->integer()->notNull(),
            'cep' => Schema::TYPE_STRING . ' NOT NULL',
            'cidade' => Schema::TYPE_STRING . ' NOT NULL',
            'logradouro' => Schema::TYPE_STRING . ' NOT NULL',
            'estado' => Schema::TYPE_STRING . ' NOT NULL',
            'numero' => $this->integer(),
            'complemento' => Schema::TYPE_STRING,
        ]);
        $this->addForeignKey('fk_funcionarios_cargo', 'funcionarios', 'id_cargo', 'cargos', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231101_133866_criar_tabela_funcionarios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231101_133651_criar_tabela_funcionarios cannot be reverted.\n";

        return false;
    }
    */
}
