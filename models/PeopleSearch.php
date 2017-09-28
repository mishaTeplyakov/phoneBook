<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PeopleSearch represents the model behind the search form about `app\models\People`.
 */
class PeopleSearch extends People
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpeople', 'header_idheader', 'division_iddivision'], 'integer'],
            [['categoriya', 'posada', 'fio', 'phone', 'inside_phone', 'mts_phone', 'lugakom_phone'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = People::find();

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
            'idpeople' => $this->idpeople,
            'header_idheader' => $this->header_idheader,
            'division_iddivision' => $this->division_iddivision,
        ]);

        $query->andFilterWhere(['like', 'categoriya', $this->categoriya])
            ->andFilterWhere(['like', 'posada', $this->posada])
            ->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'inside_phone', $this->inside_phone])
            ->andFilterWhere(['like', 'mts_phone', $this->mts_phone])
            ->andFilterWhere(['like', 'lugakom_phone', $this->lugakom_phone]);

        return $dataProvider;
    }
}
