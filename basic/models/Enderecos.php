<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enderecos".
 *
 * @property int $id
 * @property string $cep
 * @property string $cidade
 * @property string $logradouro
 * @property string $estado
 * @property string $numero
 * @property string $complemento
 *
 * @property Funcionarios[] $funcionarios
 */
class Enderecos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enderecos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cep', 'cidade', 'logradouro', 'estado', 'numero', 'complemento'], 'required'],
            [['cep', 'cidade', 'logradouro', 'estado', 'numero', 'complemento'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cep' => Yii::t('app', 'Cep'),
            'cidade' => Yii::t('app', 'Cidade'),
            'logradouro' => Yii::t('app', 'Logradouro'),
            'estado' => Yii::t('app', 'Estado'),
            'numero' => Yii::t('app', 'Numero'),
            'complemento' => Yii::t('app', 'Complemento'),
        ];
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery|FuncionariosQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionarios::class, ['id_endereco' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return EnderecosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnderecosQuery(get_called_class());
    }
}
