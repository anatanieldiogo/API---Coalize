<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%endereco}}`.
 */
class m240707_103253_create_endereco_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%endereco}}', [
            'id' => $this->primaryKey(),
            'cep' => $this->string(8),
            'logradouro' => $this->string(512),
            'numero' => $this->integer(),
            'cidade' => $this->string(512),
            'estado' => $this->string(512),
            'complemento' => $this->string(512),
            'cliente_id' => $this->integer()
        ]);

        $this->addForeignKey('FK_endereco_cliente_cliente_id', '{{%endereco}}', 'cliente_id', '{{%cliente}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_endereco_cliente_cliente_id', '{{%endereco}}');
        $this->dropTable('{{%endereco}}');
    }
}
