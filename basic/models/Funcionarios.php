<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionarios".
 *
 * @property int $id
 * @property string $nome
 * @property int $id_cargo
 * @property string $cep
 * @property string $cidade
 * @property string $logradouro
 * @property string $estado
 * @property int|null $numero
 * @property string|null $complemento
 *
 * @property Cargos $cargo
 */
class Funcionarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'id_cargo', 'cep', 'cidade', 'logradouro', 'estado'], 'required'],
            [['id_cargo', 'numero'], 'default', 'value' => null],
            [['id_cargo', 'numero'], 'integer'],
            [['nome', 'cep', 'cidade', 'logradouro', 'estado', 'complemento'], 'string', 'max' => 255],
            [['nome'], 'string', 'min' => 3],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::class, 'targetAttribute' => ['id_cargo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Nome'),
            'id_cargo' => Yii::t('app', 'Id Cargo'),
            'cep' => Yii::t('app', 'Cep'),
            'cidade' => Yii::t('app', 'Cidade'),
            'logradouro' => Yii::t('app', 'Logradouro'),
            'estado' => Yii::t('app', 'Estado'),
            'numero' => Yii::t('app', 'Numero'),
            'complemento' => Yii::t('app', 'Complemento'),
        ];
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery|CargosQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargos::class, ['id' => 'id_cargo']);
    }

    /**
     * {@inheritdoc}
     * @return FuncionariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FuncionariosQuery(get_called_class());
    }
}
