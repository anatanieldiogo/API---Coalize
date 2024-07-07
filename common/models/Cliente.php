<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cliente}}".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $cpf
 * @property string|null $foto
 * @property string|null $sexo
 *
 * @property Endereco[] $enderecos
 * @property Produto[] $produtos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cliente}}';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 50],
            [['cpf'], 'string', 'max' => 11],
            [['foto'], 'string', 'max' => 512],
            [['sexo'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'foto' => 'Foto',
            'sexo' => 'Sexo',
        ];
    }

    /**
     * Gets query for [[Enderecos]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EnderecoQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::class, ['cliente_id' => 'id']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProdutoQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['cliente_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ClienteQuery(get_called_class());
    }
}
