<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%produto}}`.
 */
class m240707_103306_create_produto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%produto}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(50),
            'preco' => $this->decimal(),
            'cliente_id' => $this->integer(),
            'foto' => $this->string(512),
        ]);

        $this->addForeignKey('FK_produto_cliente_cliente_id', '{{%produto}}', 'cliente_id', '{{%cliente}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_produto_cliente_cliente_id', '{{%produto}}');
        $this->dropTable('{{%produto}}');
    }
}
