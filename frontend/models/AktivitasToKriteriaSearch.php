<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AktivitasToKriteria;

/**
 * AktivitasToKriteriaSearch represents the model behind the search form of `frontend\models\AktivitasToKriteria`.
 */
class AktivitasToKriteriaSearch extends AktivitasToKriteria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_kriteria', 'id_aktivitas', 'id_jabatan'], 'integer'],
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
        $query = AktivitasToKriteria::find();

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
            'id_kriteria' => $this->id_kriteria,
            'id_aktivitas' => $this->id_aktivitas,
            'id_jabatan' => $this->id_jabatan,
        ]);

        return $dataProvider;
    }
}
