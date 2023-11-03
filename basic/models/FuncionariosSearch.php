<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Funcionarios;

/**
 * FuncionariosSearch represents the model behind the search form of `app\models\Funcionarios`.
 */
class FuncionariosSearch extends Funcionarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_cargo'], 'integer'],
            [['nome', 'cep', 'cidade', 'logradouro', 'estado', 'numero', 'complemento'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Funcionarios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_cargo' => $this->id_cargo,
        ]);

        $query->andFilterWhere(['ilike', 'nome', $this->nome])
            ->andFilterWhere(['ilike', 'cep', $this->cep])
            ->andFilterWhere(['ilike', 'cidade', $this->cidade])
            ->andFilterWhere(['ilike', 'logradouro', $this->logradouro])
            ->andFilterWhere(['ilike', 'estado', $this->estado])
            ->andFilterWhere(['ilike', 'numero', $this->numero])
            ->andFilterWhere(['ilike', 'complemento', $this->complemento]);

        return $dataProvider;
    }
}
