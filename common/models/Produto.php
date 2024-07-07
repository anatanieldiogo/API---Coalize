<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%produto}}".
 *
 * @property int $id
 * @property string|null $nome
 * @property float|null $preco
 * @property int|null $cliente_id
 * @property string|null $foto
 *
 * @property Cliente $cliente
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%produto}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id'], 'required'],
            [['preco'], 'number'],
            [['cliente_id'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['foto'], 'string', 'max' => 512],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['cliente_id' => 'id']],
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
            'preco' => 'Preco',
            'cliente_id' => 'Cliente ID',
            'foto' => 'Foto',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ClienteQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id' => 'cliente_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProdutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProdutoQuery(get_called_class());
    }
}
