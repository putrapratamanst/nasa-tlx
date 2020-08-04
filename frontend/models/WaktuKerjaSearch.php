<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\WaktuKerja;

/**
 * WaktuKerjaSearch represents the model behind the search form of `frontend\models\WaktuKerja`.
 */
class WaktuKerjaSearch extends WaktuKerja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_jabatan', 'hari'], 'integer'],
            [['waktu_masuk', 'waktu_keluar'], 'safe'],
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
        $query = WaktuKerja::find();

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
            'id_jabatan' => $this->id_jabatan,
            'hari' => $this->hari,
        ]);

        $query->andFilterWhere(['like', 'waktu_masuk', $this->waktu_masuk])
            ->andFilterWhere(['like', 'waktu_keluar', $this->waktu_keluar]);

        return $dataProvider;
    }
}
