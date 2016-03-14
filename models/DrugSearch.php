<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Drug;

/**
 * DrugSearch represents the model behind the search form about `app\models\Drug`.
 */
class DrugSearch extends Drug
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'total_recive', 'total_now'], 'integer'],
            [['drug_name', 'drug_supplier', 'date_recive', 'updated_at', 'created_at','q','status'], 'safe'],
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
        $query = Drug::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_recive' => $this->date_recive,
            'total_recive' => $this->total_recive,
            'total_now' => $this->total_now,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        $query->orFilterWhere(['like', 'drug_name', $this->q])
                ->orFilterWhere(['like', 'status', $this->status])
            ->orFilterWhere(['like', 'drug_supplier', $this->q]);

        return $dataProvider;
    }
}
