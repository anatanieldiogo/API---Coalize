<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%endereco}}".
 *
 * @property int $id
 * @property string|null $cep
 * @property string|null $logradouro
 * @property int|null $numero
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $complemento
 * @property int|null $cliente_id
 *
 * @property Cliente $cliente
 */
class Endereco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%endereco}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id'], 'required'],
            [['numero', 'cliente_id'], 'integer'],
            [['cep'], 'string', 'max' => 8],
            [['logradouro', 'cidade', 'estado', 'complemento'], 'string', 'max' => 512],
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
            'cep' => 'Cep',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'complemento' => 'Complemento',
            'cliente_id' => 'Cliente ID',
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
     * @return \common\models\query\EnderecoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EnderecoQuery(get_called_class());
    }
}
