<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MercadoLivre;

/**
 * MercadoLivreSearch represents the model behind the search form of `app\models\MercadoLivre`.
 */
class MercadoLivreSearch extends MercadoLivre
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'] , 'string', 'min'=>8 ,'max' => 15],
            [['id'], 'match', 'pattern'=>'/[a-zA-Z]{3}[\-]{0,1}\d{8,12}/m','skipOnError'=>true, 'message' => 'ID do produto precisa ser do modelo AAA9999999999 ou AAA-9999999999.'],
            [['code', 'access_token', 'client_id', 'client_secret'], 'safe'],
        ];
    }
    // [A-Z]{3}[\-]{0,1}\d{8,12}
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
        $query = MercadoLivre::find();
        // dd($params);
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
        ]);

        $query->andFilterWhere(['ilike', 'code', $this->code])
            ->andFilterWhere(['ilike', 'access_token', $this->access_token])
            ->andFilterWhere(['ilike', 'client_id', $this->client_id])
            ->andFilterWhere(['ilike', 'client_secret', $this->client_secret]);

        return $dataProvider;
    }
}
